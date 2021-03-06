<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('rendszam', 6)->unique();
            $table->unsignedBigInteger('markaId');
            $table->string('forgalmi', 8)->unique();
            $table->year('evjarat');

            $table->foreign('markaId')->references('id')->on('markas');
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
        Schema::dropIfExists('autos');
    }
}
