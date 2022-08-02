<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToMultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estadomulta');
            $table->foreign('id_estadomulta')->references('id')->on('estadopagomulta');
            $table->unsignedBigInteger('id_estadotramite');
            $table->foreign('id_estadotramite')->references('id')->on('estadotramitemulta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multas', function (Blueprint $table) {
            $table->dropColumn('id_estadomulta');
            $table->dropColumn('id_estadotramite');
        });
    }
}
