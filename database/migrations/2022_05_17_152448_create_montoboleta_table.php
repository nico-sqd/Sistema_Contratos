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
            $table->integer('monto_boleta')->nullable();
            $table->unsignedBigInteger('id_tipo_boleta');
            $table->foreign('id_tipo_boleta')->references('id_boleta')->on('boletagarantia');
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
        });
        Schema::dropIfExists('montoboleta');
    }
}
