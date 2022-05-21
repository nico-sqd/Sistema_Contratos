<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre_departamento');
            $table->string('codigo_sso');
            $table->unsignedBigInteger('id_subdireccion');
            $table->foreign('id_subdireccion')->references('id')->on('subdirecciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamentos', function (Blueprint $table){
            $table->dropColumn('id_subdireccion');
        });
        Schema::dropIfExists('departamentos');
    }
}
