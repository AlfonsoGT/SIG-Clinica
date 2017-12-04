<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLectura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectura', function (Blueprint $table) {
            $table->increments('idLecturaExamen');
            $table->string('patologia');
            $table->string('descripcion',10000);
            $table->string('posicionUtero')->nullable();
            $table->string('medidas')->nullable();
            $table->string('contorno')->nullable();
            $table->string('miometrio')->nullable();
            $table->string('endometrio')->nullable();
            $table->string('derecho')->nullable();
            $table->string('fondo')->nullable();
            $table->string('izquierdo')->nullable();
            $table->integer('idExamen')->unsigned();
            $table->foreign('idExamen')->references('idExamen')->on('examen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectura');
    }
}
