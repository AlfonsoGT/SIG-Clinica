<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('examen', function (Blueprint $table) {
          $table->increments('idExamen');
          $table->integer('idusuario')->unsigned()->nullable();
          $table->foreign('idUsuario')->references('id')->on('users')->onDelete('set null');
          $table->integer('idReservacion')->unsigned();
          $table->foreign('idReservacion')->references('idReservacion')->on('reservacion');
          $table->date('fechaRealizacion');
          });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('examen');
    }
}
