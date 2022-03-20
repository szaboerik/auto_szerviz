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
        
    }
    }

