<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaimpartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiasimpartidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('docente')->unsigned();
            $table->bigInteger('grupo')->unsigned();
            $table->bigInteger('materia')->unsigned();
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
        Schema::dropIfExists('materiasimpartidas');
    }
}
