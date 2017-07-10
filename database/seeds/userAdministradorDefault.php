<?php

use Illuminate\Database\Seeder;

class userAdministradorDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    App\User::create([
      'name'=>'Administrador',
      'password'=>bcrypt('123456'),
      'username'=>'Administrador',
      'id_rol'=>'1',
      'nivel_1'=>true,
      'nivel_2'=>true,
      'nivel_3'=>true,
    ]);
    }
}
