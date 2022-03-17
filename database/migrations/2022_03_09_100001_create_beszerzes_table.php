<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeszerzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beszerzes', function (Blueprint $table) {
            $table->id('besz_azon');
            $table->unsignedBigInteger('f_szam');
            $table->unsignedBigInteger('alkatresz');
            $table->unsignedBigInteger('beszall_kod');
            $table->integer('egyseg_ar');
            $table->integer('mennyiseg');
            $table->integer('besz_osszege');
            $table->boolean('atveve')->nullable();

            $table->foreign('f_szam')->references('f_szam')->on('feladats');
            $table->foreign('alkatresz')->references('alk_azon')->on('alkatreszek');
            $table->foreign('beszall_kod')->references('beszall_kod')->on('beszallitok');
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
        Schema::dropIfExists('beszerzes');
    }
}