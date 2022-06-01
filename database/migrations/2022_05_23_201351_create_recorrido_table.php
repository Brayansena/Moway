<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecorridoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorridos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_festivos');
            $table->unsignedBigInteger('id_semanas');
            $table->unsignedBigInteger('id_empresa');
            $table->string('punto_inicio');
            $table->string('punto_final');
            $table->text('imagen_recorrido')->nullable();
            $table->string('numero_ruta');

             //foreing de horarios
                $table->foreign('id_festivos')->references('id')->on('festivos')->onUpdate('cascade')->onDelete('cascade');
             //foreing de empresa
                $table->foreign('id_semanas')->references('id')->on('semanas')->onUpdate('cascade')->onDelete('cascade');
             //foreing de empresa
                $table->foreign('id_empresa')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('recorrido');
    }
}
