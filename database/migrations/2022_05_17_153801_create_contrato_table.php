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
            $table->id();
            $table->timestamps();
            $table->string('id_contrato')->nullable();
            $table->string('res_adjudicacion');
            $table->string('res_apruebacontrato');
            $table->unsignedBigInteger('id_monto');
            $table->foreign('id_monto')->references('id')->on('monto');
            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id_boleta')->on('boletagarantia');
            $table->unsignedBigInteger('id_monto_boleta');
            $table->foreign('id_monto_boleta')->references('id')->on('montoboleta');
            $table->unsignedBigInteger('id_modalidad');
            $table->foreign('id_modalidad')->references('id_modalidad')->on('modalidad');
            $table->string('aumento_contrato')->nullable();
            $table->string('res_aumento')->nullable();
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
            $table->dropColumn('id_monto_boleta');
        });
        Schema::dropIfExists('contrato');
    }
}
