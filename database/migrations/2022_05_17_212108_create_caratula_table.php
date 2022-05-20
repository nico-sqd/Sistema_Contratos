<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaratulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caratula', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id')->on('proveedor');
            $table->unsignedBigInteger('id_convenio');
            $table->foreign('id_convenio')->references('id')->on('convenios');
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
        Schema::table('caratula', function (Blueprint $table){
            $table->dropColumn('id_proveedor');
            $table->dropColumn('id_convenio');
            $table->dropColumn('id_contrato');
        });
        Schema::dropIfExists('caratula');
    }
}
