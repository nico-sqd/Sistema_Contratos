<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id('id_licitacion');
            $table->timestamps();
            $table->string('rut_proveedor');
            $table->foreign('rut_proveedor')->references('id')->on('proveedor');
            $table->date('vigencia_inicio');
            $table->date('vigencia_fin');
            $table->unsignedBigInteger('monto');
            $table->foreign('monto')->references('codigo_monto')->on('monto');
            $table->string('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios');
    }
}
