<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoContratoToContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_contrato');
            $table->foreign('estado_contrato')->references('id')->on('estadocontrato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato', function (Blueprint $table) {
            $table->dropColumn('estado_contrato');
        });
    }
}
