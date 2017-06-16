<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Validation\Rule;

class CreateTablaPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pacientes', function (Blueprint $table) {
        $table->increments('id');
          $table->string('duiPaciente')->unique()->nullable(); //evitar duplicidad en DUI
          $table->string('primerNombre');
          $table->string('segundoNombre');
          $table->string('primerApellido');
          $table->string('segundoApellido');
          $table->date('fechaNacimiento');
          $table->string('numeroCelular')->nullable();
          $table->string('duiEncargado')->unique()->nullable();
          $table->string('nombreEncargado')->nullable();
          $table->integer('idSexo')->unsigned();
          $table->foreign('idSexo')->references('idSexo')->on('sexo');
          $table->integer('idProcedencia')->unsigned();
          $table->foreign('idProcedencia')->references('idProcedencia')->on('procedencia');


      });
    }

  
//
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
