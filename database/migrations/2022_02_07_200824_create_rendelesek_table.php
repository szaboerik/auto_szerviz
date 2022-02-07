<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendelesekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendelesek', function (Blueprint $table) {
            $table->id();
            $table->string('beszerzes_azonosito');
            $table->integer('feladatszam');
            $table->string('alkatresz');
            $table->integer('beszallito_kod');
            $table->integer('egysegar');
            $table->integer('mennyiseg');
            $table->date('megrendelve');
            $table->date('atveve');
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
        Schema::dropIfExists('rendelesek');
    }
}
