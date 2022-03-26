<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER evjarat_check
        BEFORE INSERT ON autos
        FOR EACH ROW
        BEGIN
        IF NEW.evjarat > year(CURDATE()) OR NEW.evjarat < 1990 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem megfelelő évjárat!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munka_kezd_vege_check
        BEFORE INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        IF NEW.munka_kezdete > NEW.munka_vege THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem megfelelő dátum!";
        END IF;
        END');

       

        DB::unprepared('CREATE TRIGGER egysegar_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.egyseg_ar <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb az egységár!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER mennyiseg_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.mennyiseg <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb a mennyiség!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER besz_osszege_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        SET NEW.besz_osszege = NEW.mennyiseg*NEW.egyseg_ar;
        END');

        DB::unprepared('CREATE TRIGGER dolgozo_kepesseg_check
        BEFORE INSERT ON dolgozos
        FOR EACH ROW
        BEGIN
        IF NEW.kepesseg !="s" AND NEW.kepesseg !="v" THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozo kepessege v(vezeto) vagy s(szerelő)!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munka_kezdete_check
        BEFORE INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        SET NEW.munka_kezdete = CURDATE();
        END');

        /*DB::unprepared('CREATE TRIGGER dolgozo_feladathoz_check
        BEFORE INSERT ON feladats 
        FOR EACH ROW
        BEGIN
        IF NEW.szerelo != (SELECT d.d_kod from dolgozos d where d.kepesseg = "s") THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A feladathoz csak szerelő (s) vihető fel!";
        END IF;
        END');*/

        DB::unprepared('CREATE TRIGGER dolgozo_munkaora_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, dolgozos d, munkalaps m
         where f.szerelo = d.d_kod and NEW.szerelo=f.szerelo and m.m_szam = f.m_szam and m.munka_kezdete = CURDATE())>8 THEN
         SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozó egy nap nem dolgozhat 8 óránál többet!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER dolgozo_vezeto_check
        AFTER INSERT ON dolgozos
        FOR EACH ROW
        BEGIN
        IF (SELECT COUNT(d.d_kod) from dolgozos d
        where  d.kepesseg = "v")>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Csak egy vezető lehet!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkalap_munkaora_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, munkalaps m
        where m.m_szam = f.m_szam and NEW.m_szam = f.m_szam and m.munka_kezdete = CURDATE())>8 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkalap_befejezett_check
        BEFORE INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.m_szam = (SELECT m.m_szam from munkalaps m
        where m.munka_vege is not null )THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Befejezett munkalaphoz nem rendelhető feladat!";
        END IF;
        END');


        

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*DB::unprepared('DROP TRIGGER `evjarat_check`');
        DB::unprepared('DROP TRIGGER `munka_kezd_vege_check`');
        DB::unprepared('DROP TRIGGER `egysegar_check`');
        DB::unprepared('DROP TRIGGER `mennyiseg_check`');
        DB::unprepared('DROP TRIGGER `besz_osszege_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_kepesseg_check`');
        DB::unprepared('DROP TRIGGER `munka_kezdete_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_feladathoz_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_munkaora_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_vezeto_check`');
        DB::unprepared('DROP TRIGGER `munkalap_munkaora_check`');
        DB::unprepared('DROP TRIGGER `munkalap_befejezett_check`');*/
        
    
    }
    }

