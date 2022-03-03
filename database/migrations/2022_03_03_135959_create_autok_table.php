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
            $table->id('auto_id');
            $table->string('rendszam', 6);
            $table->string('marka', 30);
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
