<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_unidad');
            $table->foreign('id_unidad')->references('id')->on('unidadesmedidas');
            $table->float('cantidad');
            $table->float('valor_unitario');
            $table->unsignedBigInteger('id_movimiento');
            $table->foreign('id_movimiento')->references('id')->on('movimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cantidades', function (Blueprint $table) {
            $table->dropColumn('id_unidad');
            $table->dropColumn('id_movimiento');
        });
        Schema::dropIfExists('cantidades');
    }
}
