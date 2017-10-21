<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaExamenPlaca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('examen_placa', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idExamen')->unsigned();
          $table->foreign('idExamen')->references('idExamen')->on('examen');
          $table->integer('idPlaca')->unsigned();
          $table->foreign('idPlaca')->references('idPlaca')->on('placa');
          $table->integer('numeroUsadas')->nullable();
          $table->integer('numeroRepetidas')->nullable();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('examen_placa');
    }
}
