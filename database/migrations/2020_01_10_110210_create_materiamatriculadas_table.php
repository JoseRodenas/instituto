<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriamatriculadasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up() {
        Schema::create('materiamatriculada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('alumno')->unsigned();
            $table->bigInteger('materia')->unsigned();
            $table->bigInteger('grupo')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $table->dropForeign('alumno');
        $table->dropForeign('materia');
        $table->dropForeign('grupo');
    }
}
