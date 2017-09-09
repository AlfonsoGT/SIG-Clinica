<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->date('fechaCompra');
            $table->integer('cantidadProducto');
            $table->float('precioUnidad');
            $table->integer('idTipoProducto')->unsigned();
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('tipoProducto');
            $table->boolean('reciente')->default(true);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
