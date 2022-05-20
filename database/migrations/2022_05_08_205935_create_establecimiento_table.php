<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('establecimiento', function (Blueprint $table) {
            $table->string('establecimiento');
            $table->string('abreviacion');
            $table->unsignedBigInteger('codigo_deis');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('establecimiento');
            $table->foreign('establecimiento')->references('id')->on('establecimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('establecimiento');
        });
        Schema::dropIfExists('establecimiento');
    }
}
