<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasalumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltasalumnos', function (Blueprint $table) {
            $table->bigIncrements('idfaltasalumno');
            $table->bigInteger("alumno")->unsigned();
            $table->boolean("asiste");
            $table->boolean("retraso")->nullable();
            $table->boolean("justificada")->nullable();
            $table->bigInteger("periodoclase_id")->unsigned();
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
        Schema::dropIfExists('faltasalumnos');
    }
}
