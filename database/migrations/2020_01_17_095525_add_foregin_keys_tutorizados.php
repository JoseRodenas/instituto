<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginKeysTutorizados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutorizados', function (Blueprint $table) {
            $table->foreign('tutorado')->references('id')->on('users');
            $table->foreign('tutor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutorizados', function (Blueprint $table) {
            $table->dropForeign('tutorizados_tutorado_foreign');
            $table->dropForeign('tutorizados_tutor_foreign');
        });
    }
}
