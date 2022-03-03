<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunkalapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('munkalaps', function (Blueprint $table) {
            $table->id();
            $table->integer('m_szam');
            $table->string('ugyfel_neve', 50);
            $table->string('ugyfel_telszama', 30);
            $table->string('rendszam', 6);
            $table->date('munka_kezdete');
            $table->date('munka_vege')->nullable();
            $table->integer('fizetendo')->nullable();
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
        Schema::dropIfExists('munkalaps');
    }
}
