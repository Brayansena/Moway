<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosparadaRecorridosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntosparada_recorridos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_puntos_paradas');
            $table->unsignedBigInteger('id_recorridos');

            //foraniia de puntos de parada
            $table->foreign('id_puntos_paradas')->references('id')->on('puntos_paradas')->onUpdate('cascade')->onDelete('cascade');
            //forania de recorrido
            $table->foreign('id_recorridos')->references('id')->on('recorridos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('puntosparada_recorridos');
    }
}
