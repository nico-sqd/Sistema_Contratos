<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontoboletaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montoboleta', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->float('monto_boleta')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('id_boleta')->nullable();
            $table->unsignedBigInteger('id_tipo_boleta');
            $table->foreign('id_tipo_boleta')->references('id')->on('boletagarantia');
            $table->unsignedBigInteger('id_moneda');
            $table->foreign('id_moneda')->references('id')->on('tipo_moneda');
            $table->string('otraboleta')->nullable();
            $table->string('institucion');
            $table->string('id_contrato_original')->nullable();
            $table->string('id_contrato_modificada')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('montoboleta', function (Blueprint $table){
            $table->dropColumn('id_tipo_boleta');
            $table->dropColumn('id_moneda');
        });
        Schema::dropIfExists('montoboleta');
    }
}
