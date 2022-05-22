<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdirecciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre_subdireccion');
            $table->unsignedBigInteger('id_establecimiento');
            $table->foreign('id_establecimiento')->references('id')->on('establecimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subdirecciones', function (Blueprint $table){
            $table->dropColumn('id_establecimiento');
        });
        Schema::dropIfExists('subdirecciones');
    }
}
