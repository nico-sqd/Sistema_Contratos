<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_oc');
            $table->float('valor_total_oc')->nullable();
            $table->string('nmr_factura');
            $table->date('fecha_factura');
            $table->float('valor_factura');
            $table->unsignedBigInteger('id_establecimiento')->nullable();
            $table->foreign('id_establecimiento')->references('id')->on('establecimiento');
            $table->unsignedBigInteger('id_dispositivo')->nullable();
            $table->foreign('id_dispositivo')->references('id')->on('dispositivos');
            $table->float('monto_contrato_actualizado')->nullable();
            $table->unsignedBigInteger('id_contrato');
            $table->foreign('id_contrato')->references('id')->on('contrato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropColumn('id_contrato');
            $table->dropColumn('id_establecimiento');
            $table->dropColumn('id_dispositivo');
        });
        Schema::dropIfExists('movimientos');
    }
}
