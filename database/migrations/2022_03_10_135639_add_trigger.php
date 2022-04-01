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
        //1. Az autó évjárata nem lehet 1990nél régebbi, és a mostani évnél nagyobb.

        DB::unprepared('CREATE TRIGGER evjarat_check
        BEFORE INSERT ON autos
        FOR EACH ROW
        BEGIN
        IF NEW.evjarat > year(CURDATE()) OR NEW.evjarat < 1990 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem megfelelő évjárat!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER evjarat_update_check
        AFTER UPDATE ON autos
        FOR EACH ROW
        BEGIN
        IF NEW.evjarat > year(CURDATE()) OR NEW.evjarat < 1990 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem megfelelő évjárat!";
        END IF;
        END');


        //2. A munka kezdete dátum nem lehet nagyobb a munka vége dátumnál.

        DB::unprepared('CREATE TRIGGER munka_kezd_vege_check
        BEFORE INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        IF NEW.munka_kezdete > NEW.munka_vege THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem megfelelő dátum!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munka_vege_megad_check
        AFTER UPDATE ON munkalaps
        FOR EACH ROW
        BEGIN
        IF NEW.munka_vege!=CURDATE() THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet a mai napon kívül más a munka vége dátum!";
        END IF;
        END');

       
        //3. Az egységár nem lehet 0 vagy kisebb.

        DB::unprepared('CREATE TRIGGER egysegar_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.egyseg_ar <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb az egységár!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER egysegar_update_check
        AFTER UPDATE ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.egyseg_ar <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb az egységár!";
        END IF;
        END');


        //4. A beszerzés mennyisége nem lehet 0 vagy kisebb.

        DB::unprepared('CREATE TRIGGER mennyiseg_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.mennyiseg <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb a mennyiség!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER mennyiseg_update_check
        AFTER UPDATE ON beszerzes
        FOR EACH ROW
        BEGIN
        IF NEW.mennyiseg <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb a mennyiség!";
        END IF;
        END');


        //5. Nem lehet 0 vagy kisebb a munkaóra.

        DB::unprepared('CREATE TRIGGER munkaora_check
        BEFORE INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.munkaora <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb a munkaóra!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkaora_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.munkaora <=0  THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Nem lehet 0 vagy kisebb a munkaóra!";
        END IF;
        END');

        //6. Az óradíjnak 5000 és 20000 között kell lennie.


        DB::unprepared('CREATE TRIGGER oradij_check
        BEFORE INSERT ON jellegs
        FOR EACH ROW
        BEGIN
        IF NEW.oradij <5000 OR NEW.oradij>20000 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER oradij_update_check
        AFTER UPDATE ON jellegs
        FOR EACH ROW
        BEGIN
        IF NEW.oradij <5000 OR NEW.oradij>20000 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!";
        END IF;
        END');


        //7. A beszerzés összege: mennyiség*egységár

        DB::unprepared('CREATE TRIGGER besz_osszege_check
        BEFORE INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        SET NEW.besz_osszege = NEW.mennyiseg*NEW.egyseg_ar;
        END');

        DB::unprepared('CREATE TRIGGER besz_osszege_update_check
        BEFORE UPDATE ON beszerzes
        FOR EACH ROW
        BEGIN
        SET NEW.besz_osszege = NEW.mennyiseg*NEW.egyseg_ar;
        END');


        

        //8. A dolgozók képessége vagy vezető vagy szerelő lehet.

        DB::unprepared('CREATE TRIGGER dolgozo_kepesseg_check
        BEFORE INSERT ON dolgozos
        FOR EACH ROW
        BEGIN
        IF NEW.kepesseg !="s" AND NEW.kepesseg !="v" THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozo kepessege v(vezeto) vagy s(szerelő)!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER dolgozo_kepesseg_update_check
        AFTER UPDATE ON dolgozos
        FOR EACH ROW
        BEGIN
        IF NEW.kepesseg !="s" AND NEW.kepesseg !="v" THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozo kepessege v(vezeto) vagy s(szerelő)!";
        END IF;
        END');

        //9. A munka kezdete a munkalap létrehozásánál aktuális dátum.

        DB::unprepared('CREATE TRIGGER munka_kezdete_check
        BEFORE INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        SET NEW.munka_kezdete = CURDATE();
        END');

        //10. A feladathoz csak szerelő csatolható.

        DB::unprepared('CREATE TRIGGER dolgozo_feladathoz_check
        AFTER INSERT ON feladats 
        FOR EACH ROW
        BEGIN
        IF NEW.szerelo = ANY (SELECT d.d_kod from dolgozos d, feladats f, munkalaps m where d.kepesseg = "v") THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A feladathoz csak szerelő (s) vihető fel!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER dolgozo_feladathoz_update_check
        AFTER UPDATE ON feladats 
        FOR EACH ROW
        BEGIN
        IF NEW.szerelo = ANY (SELECT d.d_kod from dolgozos d, feladats f, munkalaps m where d.kepesseg = "v") THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A feladathoz csak szerelő (s) vihető fel!";
        END IF;
        END');

        //11. Egy dolgozó nem dolgozhat 8 óránál többet egy nap.

        DB::unprepared('CREATE TRIGGER dolgozo_munkaora_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, dolgozos d, munkalaps m
         where f.szerelo = d.d_kod and d.kepesseg = "s" and NEW.szerelo=f.szerelo and m.m_szam = f.m_szam and f.created_at = CURDATE())>8 THEN
         SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozó egy nap nem dolgozhat 8 óránál többet!";
        END IF;
        END');


        DB::unprepared('CREATE TRIGGER dolgozo_munkaora_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, dolgozos d, munkalaps m
        where f.szerelo = d.d_kod and d.kepesseg = "s" and NEW.szerelo=f.szerelo and m.m_szam = f.m_szam and f.created_at = CURDATE())>8 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "A dolgozó egy nap nem dolgozhat 8 óránál többet!";
        END IF;
        END');

        //12. Csak egy vezető lehet a szervizben.

        DB::unprepared('CREATE TRIGGER dolgozo_vezeto_check
        AFTER INSERT ON dolgozos
        FOR EACH ROW
        BEGIN
        IF (SELECT COUNT(d.d_kod) from dolgozos d
        where  d.kepesseg = "v")>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Csak egy vezető lehet!";
        END IF;
        END');


        DB::unprepared('CREATE TRIGGER dolgozo_vezeto_update_check
        AFTER UPDATE ON dolgozos
        FOR EACH ROW
        BEGIN
        IF (SELECT COUNT(d.d_kod) from dolgozos d
        where  d.kepesseg = "v")>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Csak egy vezető lehet!";
        END IF;
        END');

        //13. Egy munkalaphoz egy nap maximum 8 órányi feladatot lehet csatolni.

        DB::unprepared('CREATE TRIGGER munkalap_munkaora_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, munkalaps m
        where m.m_szam = f.m_szam and NEW.m_szam = f.m_szam and f.created_at = CURDATE())>8 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkalap_munkaora_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF (SELECT SUM(f.munkaora) from feladats f, munkalaps m
        where m.m_szam = f.m_szam and NEW.m_szam = f.m_szam and f.created_at = CURDATE())>8 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!";
        END IF;
        END');


        //14. A már befejezett munkalaphoz nem rendelhető újabb feladat.

        DB::unprepared('CREATE TRIGGER munkalap_befejezett_check
        BEFORE INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.m_szam = (SELECT m.m_szam from munkalaps m
        where m.munka_vege is not null )THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Befejezett munkalaphoz nem rendelhető feladat!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkalap_befejezett_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.m_szam = (SELECT m.m_szam from munkalaps m
        where m.munka_vege is not null )THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Befejezett munkalaphoz nem rendelhető feladat!";
        END IF;
        END');


        //15. Egy nap egy autó csak egy munkalaphoz csatolható.

        DB::unprepared('CREATE TRIGGER munkalap_rendszam_check
        AFTER INSERT ON munkalaps
        FOR EACH ROW
        BEGIN
        IF  (SELECT COUNT(m.autoId) from munkalaps m where m.autoId = NEW.autoId and m.created_at = CURDATE())>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy nap egy autó csak egy munkalapra vihető fel!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER munkalap_rendszam_update_check
        AFTER UPDATE ON munkalaps
        FOR EACH ROW
        BEGIN
        IF  (SELECT COUNT(m.autoId) from munkalaps m where m.autoId = NEW.autoId and m.created_at = CURDATE())>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy nap egy autó csak egy munkalapra vihető fel!";
        END IF;
        END');

        //15. Egy munkalaphoz csak egyféle jellegű feladat csatolható.

        DB::unprepared('CREATE TRIGGER feladat_jelleg_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        IF  (SELECT COUNT(f.jelleg) from feladats f, munkalaps m where f.jelleg = NEW.jelleg 
        and f.m_szam = NEW.m_szam and m.m_szam = f.m_szam)>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy munkalaphoz csak egyféle jellegű feladat csatolható!";
        END IF;
        END');

        DB::unprepared('CREATE TRIGGER feladat_jelleg_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF  (SELECT COUNT(f.jelleg) from feladats f, munkalaps m where f.jelleg = NEW.jelleg 
        and f.m_szam = NEW.m_szam and m.m_szam = f.m_szam)>1 THEN
        SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Egy munkalaphoz csak egyféle jellegű feladat csatolható!";
        END IF;
        END');


        
        //16. Feladat összege = feladat óraszáma*hozzá kapcs jelleg óradíja.

        DB::unprepared('CREATE TRIGGER feladat_osszege_check
        BEFORE INSERT ON feladats
        FOR EACH ROW
        BEGIN
        SET NEW.f_osszege = NEW.munkaora*(SELECT j.oradij from jellegs j where NEW.jelleg = j.jelleg);
        END');

        DB::unprepared('CREATE TRIGGER feladat_osszege_update_check
        BEFORE UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        IF NEW.jelleg <> OLD.jelleg || NEW.szerelo <> OLD.szerelo || NEW.munkaora <> OLD.munkaora THEN
        SET NEW.f_osszege = NEW.munkaora*(SELECT j.oradij from jellegs j where NEW.jelleg = j.jelleg);
        END IF;
        END');

        //17. Fizetendő mező számítása.
        
        DB::unprepared('CREATE TRIGGER fizetendo_munkalap_check
        AFTER INSERT ON feladats
        FOR EACH ROW
        BEGIN
        UPDATE munkalaps
        SET fizetendo =(SELECT SUM(f.f_osszege) from feladats f where NEW.m_szam = m_szam) where m_szam = NEW.m_szam;
        END');

        DB::unprepared('CREATE TRIGGER fizetendo_munkalap_update_check
        AFTER UPDATE ON feladats
        FOR EACH ROW
        BEGIN
        UPDATE munkalaps
        SET fizetendo =(SELECT SUM(f.f_osszege) from feladats f where NEW.m_szam = m_szam)+
        (SELECT IFNULL(SUM(f.besz_osszege),0) from feladats f where NEW.m_szam = m_szam) where m_szam = NEW.m_szam;
        END');

        DB::unprepared('CREATE TRIGGER fizetendo_munkalap_delete_check
        AFTER DELETE ON feladats
        FOR EACH ROW
        BEGIN
        UPDATE munkalaps
        SET fizetendo =(SELECT SUM(f.f_osszege) from feladats f where OLD.m_szam = m_szam) where m_szam = OLD.m_szam;
        END');


        //18. Ha van beszerzés, a hozzá kapcs. feladat besz_összegéhez átadva a beszerzés besz. összege.

        DB::unprepared('CREATE TRIGGER feladat_beszerzes_osszege_check
        AFTER INSERT ON beszerzes
        FOR EACH ROW
        BEGIN
        UPDATE feladats
        SET besz_osszege = (SELECT SUM(b.besz_osszege) from beszerzes b where NEW.f_szam = f_szam and b.f_szam=NEW.f_szam) where NEW.f_szam = f_szam;
        END');

        DB::unprepared('CREATE TRIGGER feladat_beszerzes_osszege_update_check
        AFTER UPDATE ON beszerzes
        FOR EACH ROW
        BEGIN
        UPDATE feladats
        SET besz_osszege = (SELECT SUM(b.besz_osszege) from beszerzes b where NEW.f_szam = f_szam and b.f_szam=NEW.f_szam) where NEW.f_szam = f_szam;
        END');

        DB::unprepared('CREATE TRIGGER feladat_beszerzes_osszege_delete_check
        AFTER DELETE ON beszerzes
        FOR EACH ROW
        BEGIN
        UPDATE feladats
        SET besz_osszege = (SELECT SUM(b.besz_osszege) from beszerzes b where OLD.f_szam = f_szam and b.f_szam=OLD.f_szam) where OLD.f_szam = f_szam;
        END');

        

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `evjarat_check`');
        DB::unprepared('DROP TRIGGER `evjarat_update_check`');
        DB::unprepared('DROP TRIGGER `munka_kezd_vege_check`');
        DB::unprepared('DROP TRIGGER `munka_vege_megad_check`');
        DB::unprepared('DROP TRIGGER `egysegar_check`');
        DB::unprepared('DROP TRIGGER `egysegar_update_check`');
        DB::unprepared('DROP TRIGGER `mennyiseg_check`');
        DB::unprepared('DROP TRIGGER `mennyiseg_update_check`');
        DB::unprepared('DROP TRIGGER `besz_osszege_check`');
        DB::unprepared('DROP TRIGGER `besz_osszege_update_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_kepesseg_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_kepesseg_update_check`');
        DB::unprepared('DROP TRIGGER `munka_kezdete_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_feladathoz_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_feladathoz_update_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_munkaora_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_munkaora_update_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_vezeto_check`');
        DB::unprepared('DROP TRIGGER `dolgozo_vezeto_update_check`');
        DB::unprepared('DROP TRIGGER `munkalap_munkaora_check`');
        DB::unprepared('DROP TRIGGER `munkalap_munkaora_update_check`');
        DB::unprepared('DROP TRIGGER `munkalap_befejezett_check`');
        DB::unprepared('DROP TRIGGER `munkalap_befejezett_update_check`');
        DB::unprepared('DROP TRIGGER `munkalap_rendszam_check`');
        DB::unprepared('DROP TRIGGER `munkalap_rendszam_update_check`');
        DB::unprepared('DROP TRIGGER `munkaora_check`');
        DB::unprepared('DROP TRIGGER `munkaora_update_check`');
        DB::unprepared('DROP TRIGGER `oradij_check`');
        DB::unprepared('DROP TRIGGER `oradij_update_check`');
        DB::unprepared('DROP TRIGGER `feladat_jelleg_check`');
        DB::unprepared('DROP TRIGGER `feladat_jelleg_update_check`');
        DB::unprepared('DROP TRIGGER `feladat_osszege_check`');
        DB::unprepared('DROP TRIGGER `feladat_osszege_update_check`');
        DB::unprepared('DROP TRIGGER `fizetendo_munkalap_check`');
        DB::unprepared('DROP TRIGGER `fizetendo_munkalap_update_check`');
        DB::unprepared('DROP TRIGGER `fizetendo_munkalap_delete_check`');
        DB::unprepared('DROP TRIGGER `feladat_beszerzes_osszege_check`');
        DB::unprepared('DROP TRIGGER `feladat_beszerzes_osszege_update_check`');
        DB::unprepared('DROP TRIGGER `feladat_beszerzes_osszege_delete_check`');
    
    }
    }

