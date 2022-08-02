<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nmr_memo_informe');
            $table->string('nmr_oficio')->nullable();
            $table->date('fecha_oficio')->nullable();
            $table->date('fecha_notificacion')->nullable();
            $table->integer('plazo_dias_notificacion')->nullable();
            $table->string('presenta_descargos')->nullable();
            $table->string('nmr_memo_juridica')->nullable();
            $table->date('fecha_memo')->nullable();
            $table->string('nmr_res_exenta')->nullable();
            $table->date('fecha_res_exenta')->nullable();
            $table->integer('plazo_dias_exenta')->nullable();
            $table->string('presenta_rec_de_reposicion')->nullable();
            $table->string('nmr_memo_juridica_2')->nullable();
            $table->string('nmr_res_exenta_2')->nullable();
            $table->date('fecha_res_exenta_2')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado_comprobante_pago_proveedor')->nullable();
            $table->date('fecha_estado_comprobante_pago_proveedor')->nullable();
            $table->string('estado_comprobante_pago_garantia')->nullable();
            $table->date('fecha_estado_comprobante_pago_garantia')->nullable();
            $table->UnsignedBigInteger('id_contrato');
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
        Schema::table('multas', function (Blueprint $table) {
            $table->dropColumn('id_contrato');
        });
        Schema::dropIfExists('multas');
    }
}
