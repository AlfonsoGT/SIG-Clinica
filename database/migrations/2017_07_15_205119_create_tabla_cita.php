<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaCita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('idCita');
            $table->date('fechaCita');
            $table->time('horaCita');
            $table->integer('idTipoExamen')->unsigned();
            $table->foreign('idTipoExamen')->references('idTipoExamen')->on('tipoExamen')->onDelete('cascade');
            $table->boolean('habilitado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('citas');
    }
}
