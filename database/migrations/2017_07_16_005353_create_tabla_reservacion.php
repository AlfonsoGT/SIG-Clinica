<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaReservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion', function (Blueprint $table) {
            $table->increments('idReservacion');
            $table->string('numeroRecibo');
            $table->date('fechaPago');
            $table->string('referencia')->nullable();
            $table->string('usgIndicacion')->nullable();
            $table->boolean('preparacion')->nullable()->default(0);
            $table->integer('idCita')->unsigned();
            $table->foreign('idCita')->references('idCita')->on('citas');
            $table->integer('idRegionAnatomica')->unsigned();
            $table->foreign('idRegionAnatomica')->references('idRegionAnatomica')->on('regionAnatomica');
            $table->integer('idPaciente')->unsigned();
            $table->foreign('idPaciente')->references('idPaciente')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion');
    }
}
