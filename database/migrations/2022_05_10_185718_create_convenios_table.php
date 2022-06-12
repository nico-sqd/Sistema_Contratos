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
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('id_licitacion');
            $table->longText('convenio');
            $table->unsignedBigInteger('rut_proveedor');
            $table->foreign('rut_proveedor')->references('id')->on('proveedor');
            $table->unsignedBigInteger('rut');
            $table->foreign('rut')->references('id')->on('users');
            $table->date('vigencia_inicio');
            $table->date('vigencia_fin');
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
        Schema::table('convenios', function (Blueprint $table){
            $table->dropColumn('rut_proveedor');
            $table->dropColumn('rut');
        });
        Schema::dropIfExists('convenios');
    }
}
