<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('idMaterial');
            $table->integer('cantidadMaterial');
            $table->date('fecha');
            $table->integer('cantidadUnidadMaterial')->nullable();
            $table->double('precio')->nullable();
            $table->string('proveedor')->nullable();
            $table->integer('idEntrada')->unsigned()->nullable();
            $table->foreign('idEntrada')->references('idEntrada')->on('entrada');
            $table->integer('idSalida')->unsigned()->nullable();
            $table->foreign('idSalida')->references('idSalida')->on('salida');
            $table->integer('idTipoUnidad')->unsigned();
            $table->foreign('idTipoUnidad')->references('idTipoUnidad')->on('tipoUnidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material');
    }
}
