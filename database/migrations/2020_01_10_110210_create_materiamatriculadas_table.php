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
<<<<<<< HEAD
        Schema::create('materiamatriculada', function (Blueprint $table) {
=======
        Schema::create('materiasmatriculadas', function (Blueprint $table) {
>>>>>>> 6d812decd20b97b9edaf58dc72d6e769b6894472
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
<<<<<<< HEAD
        $table->dropForeign('alumno');
        $table->dropForeign('materia');
        $table->dropForeign('grupo');
=======
        Schema::dropIfExists('materiasmatriculadas');
>>>>>>> 6d812decd20b97b9edaf58dc72d6e769b6894472
    }
}
