<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosParadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_paradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_letra');
            $table->string('nombre_punto_parada')->nullable();
            //foreing letra
            $table->foreign('id_letra')->references('id')->on('letras')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_paradas');
    }
}
