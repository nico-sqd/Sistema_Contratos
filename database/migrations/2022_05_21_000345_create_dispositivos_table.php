<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre_dispositivo');
            $table->unsignedBigInteger('id_departamento')->nullable();;
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->unsignedBigInteger('id_subdireccion')->nullable();;
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
        Schema::table('dispositivos', function (Blueprint $table){
            $table->dropColumn('id_departamento');
            $table->dropColumn('id_subdireccion');
        });
        Schema::dropIfExists('dispositivos');
    }
}
