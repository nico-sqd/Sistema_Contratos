<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('moneda');
            $table->unsignedBigInteger('id_tipo_moneda');
            $table->foreign('id_tipo_moneda')->references('id_tipo')->on('tipo_moneda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monto', function (Blueprint $table){
            $table->dropColumn('id_tipo_moneda');
        });
        Schema::dropIfExists('monto');
    }
}
