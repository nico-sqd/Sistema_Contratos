<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileToMontoboleta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('montoboleta', function (Blueprint $table) {
            $table->unsignedBigInteger('archivo')->nullable();
            $table->foreign('archivo')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('montoboleta', function (Blueprint $table) {
            $table->dropColumn('archivo');
        });
    }
}
