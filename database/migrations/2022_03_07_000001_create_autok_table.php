<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autok', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('rendszam', 6)->primary();
            $table->string('marka', 30)->references('marka')->on('markak');
            $table->string('forgalmi', 8);
            $table->year('evjarat');

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
        Schema::dropIfExists('autok');
    }
}
