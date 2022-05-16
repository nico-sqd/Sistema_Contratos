<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->id('id_contrato');
            $table->timestamps();
            $table->string('res_adjudicacion');
            $table->string('res_aprueba_contrato');
            $table->unsignedBigInteger('id_monto');
            $table->foreign('id_monto')->references('codigo_monto')->on('monto');
            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id_boleta')->on('boletagarantia');
            $table->unsignedBigInteger('id_modalidad');
            $table->foreign('id_modalidad')->references('id_modalidad')->on('modalidad');
            $table->string('aumento_contrato');
            $table->string('res_aumento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato', function (Blueprint $table){
            $table->dropColumn('id_monto');
            $table->dropColumn('id_boleta');
            $table->dropColumn('id_modalidad');
        });
        Schema::dropIfExists('contrato');
    }
}
