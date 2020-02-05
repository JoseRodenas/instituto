<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToFaltasalumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faltasalumnos', function (Blueprint $table) {
            $table->foreign('alumno')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('periodoclase_id')->references('id')->on('periodosclases')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faltasalumnos', function (Blueprint $table) {
            $table->dropForeign('faltasalumnos_alumno_foreign');
            $table->dropForeign('faltasalumnos_periodoclase_id_foreign');
        });
    }
}
