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
            $table->softDeletes();
            $table->unsignedBigInteger('id_licitacion')->nullable();
            $table->foreign('id_licitacion')->references('id')->on('convenios');
            $table->string('id_contrato')->nullable();
            $table->string('res_adjudicacion');
            $table->string('res_apruebacontrato');
            $table->unsignedBigInteger('id_monto');
            $table->foreign('id_monto')->references('id')->on('monto');
            $table->unsignedBigInteger('id_tipo_moneda');
            $table->foreign('id_tipo_moneda')->references('id')->on('tipo_moneda');
            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id')->on('boletagarantia');
            $table->unsignedBigInteger('id_modalidad');
            $table->foreign('id_modalidad')->references('id')->on('modalidad');
            $table->unsignedBigInteger('rut_proveedor');
            $table->foreign('rut_proveedor')->references('id')->on('proveedor');
            $table->unsignedBigInteger('rut');
            $table->foreign('rut')->references('id')->on('users');
            $table->string('aumento_contrato')->nullable();
            $table->string('res_aumento')->nullable();
            $table->text('descripcion')->nullable();
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
            $table->dropColumn('id_licitacion');
            $table->dropColumn('id_monto');
            $table->dropColumn('id_tipo_moneda');
            $table->dropColumn('id_boleta');
            $table->dropColumn('id_modalidad');
            $table->dropColumn('rut_proveedor');
            $table->dropColumn('rut');
        });
        Schema::dropIfExists('contrato');
    }
}
