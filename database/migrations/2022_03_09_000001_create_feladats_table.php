<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeladatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feladats', function (Blueprint $table) {
            $table->id('f_szam');
            $table->unsignedBigInteger('m_szam');
            $table->unsignedBigInteger('jelleg');
            $table->unsignedBigInteger('szerelo');
            $table->float('munkaora')->nullable();
            $table->integer('besz_osszege');

            $table->foreign('m_szam')->references('m_szam')->on('munkalaps');
            $table->foreign('jelleg')->references('jelleg')->on('jellegeks');
            $table->foreign('szerelo')->references('d_kod')->on('dolgozok');
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
        Schema::dropIfExists('feladats');
    }
}
