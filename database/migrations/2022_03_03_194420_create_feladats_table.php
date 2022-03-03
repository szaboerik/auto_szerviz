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
            $table->id();
            $table->integer('f_szam');
            $table->integer('m_szam');
            $table->integer('jelleg');
            $table->integer('szerelo');
            $table->float('munkaora')->nullable();
            $table->integer('besz_osszege');
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
