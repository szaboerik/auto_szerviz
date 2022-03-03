<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeszerzesekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beszerzesek', function (Blueprint $table) {
            $table->id();
            $table->id('besz_azon');
            $table->integer('f_szam');
            $table->integer('alkatresz');
            $table->smallInteger('beszall_kod');
            $table->integer('egyseg_ar');
            $table->integer('mennyiseg');
            $table->integer('besz_osszege');
            $table->boolean('atveve');
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
        Schema::dropIfExists('beszerzesek');
    }
}
