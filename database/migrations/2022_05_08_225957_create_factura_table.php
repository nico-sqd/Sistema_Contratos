<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('codigo_factura');
            $table->date('fecha');
            $table->unsignedBigInteger('codigo_monto');
            $table->foreign('codigo_monto')->references('id')->on('monto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factura', function (Blueprint $table){
            $table->dropColumn('codigo_monto');
        });
        Schema::dropIfExists('factura');
    }
}
