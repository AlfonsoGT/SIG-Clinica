<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('username')->unique(); /*donde se debe meter el Username */
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id_rol')->on('roles');
            $table->boolean('nivel_1')->default(false);
            $table->boolean('nivel_2')->default(false);
            $table->boolean('nivel_3')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
