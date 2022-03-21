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
        DB::unprepared('CREATE TRIGGER date_check
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

        DB::unprepared('CREATE TRIGGER munka_kezdete_tegnap_check
        BEFORE INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        IF NEW.munka_kezdete < CURDATE()-1  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A munka kezdet dátuma nem lehet tegnapnál régebbi!";
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
        DB::unprepared('DROP TRIGGER `date_check`');
        DB::unprepared('DROP TRIGGER `munka_kezd_vege_check`');
        DB::unprepared('DROP TRIGGER `egysegar_check`');
        DB::unprepared('DROP TRIGGER `mennyiseg_check`');
        DB::unprepared('DROP TRIGGER `besz_osszege_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_kepesseg_check`');
        DB::unprepared('DROP TRIGGER `munka_kezdete_tegnap_check`');
    
    }
    }

