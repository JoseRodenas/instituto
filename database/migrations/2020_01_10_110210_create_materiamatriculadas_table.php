<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriamatriculadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiamatriculada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alumno')->unsigned()->nullable();
            $table->integer('materia')->nullable();
            $table->integer('grupo')->nullable();
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
        Schema::dropIfExists('materiamatriculada');
    }
}
