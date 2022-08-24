<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumentocontratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aumentocontrato', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->float('monto_aumento');
            $table->string('res_aumento');
            $table->float('monto_total');
            $table->string('res_aprueba_aumento');
            $table->date('fecha_resolucion');
            $table->unsignedBigInteger('id_contrato');
            $table->foreign('id_contrato')->references('id')->on('contrato');
            $table->unsignedBigInteger('id_monto_boleta');
            $table->foreign('id_monto_boleta')->references('id')->on('montoboleta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aumentocontrato', function (Blueprint $table) {
            $table->dropColumn('id_monto_boleta');
            $table->dropColumn('id_contrato');
        });
        Schema::dropIfExists('aumentocontrato');
    }
}
