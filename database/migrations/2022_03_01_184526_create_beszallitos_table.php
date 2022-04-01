<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeszallitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beszallitos', function (Blueprint $table) {
            $table->id('beszall_kod');
            $table->string('nev', 50)->unique();
            $table->string('irsz', 4);
            $table->string('cim', 50);
            $table->string('elerhetoseg', 12)->unique();
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
        Schema::dropIfExists('beszallitos');
    }
}
