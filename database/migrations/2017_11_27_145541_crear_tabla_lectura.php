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
        Schema::create('lecturaExamen', function (Blueprint $table) {
            $table->increments('idLecturaExamen');
            $table->string('patologia');
            $table->string('descripcion');
            $table->integer('idTipoExamen')->unsigned();
            $table->foreign('idTipoExamen')->references('idTipoExamen')->on('tipoExamen');
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
        Schema::dropIfExists('lecturaExamen');
    }
}
