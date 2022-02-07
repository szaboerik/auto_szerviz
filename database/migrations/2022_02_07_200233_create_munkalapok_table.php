<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunkalapokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('munkalapok', function (Blueprint $table) {
            $table->id();
            $table->integer('beszerzes_azonosito');
            $table->string('ugyfel_nev');
            $table->integer('ugyfel_telefonszam');
            $table->string('rendszam');
            $table->date('auto_erkezese');
            $table->date('munka_kezdete');
            $table->date('munka_vege');
            $table->date('auto_tavozasa');
            $table->integer('fizetendo_osszeg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('munkalapok');
    }
}
