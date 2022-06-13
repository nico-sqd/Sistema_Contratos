<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAumentocontratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aumentocontrato', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('monto_aumento');
            $table->string('res_aumento');
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
        Schema::table('aumentocontrato', function (Blueprint $table) {
            $table->dropColumn('id_contrato');
        });
        Schema::dropIfExists('aumentocontrato');
    }
}
