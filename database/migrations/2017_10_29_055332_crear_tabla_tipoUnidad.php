<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTipoUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoUnidad', function (Blueprint $table) {
            $table->increments('idTipoUnidad');
            $table->string('nombreTipoUnidad');
            $table->integer('idTipoMaterial')->unsigned();
            $table->foreign('idTipoMaterial')->references('idTipoMaterial')->on('tipomaterial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoUnidad');
    }
}
