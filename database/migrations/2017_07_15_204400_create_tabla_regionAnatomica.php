<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaRegionAnatomica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('regionanatomica', function (Blueprint $table) {
            $table->increments('idRegionAnatomica');
            $table->string('nombreRegionAnatomica');
             $table->integer('idTipoExamen')->unsigned();
            $table->foreign('idTipoExamen')->references('idTipoExamen')->on('tipoExamen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regionanatomica');
    }
}
