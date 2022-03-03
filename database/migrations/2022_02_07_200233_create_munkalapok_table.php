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
            $table->integer('m_szam');
            $table->string('ugyfel_neve', 50);
            $table->string('ugyfel_telszama', 30);
            $table->string('rendszam', 6);
            $table->date('munka_kezdete');
            $table->date('munka_vege');
            $table->integer('fizetendo');
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
