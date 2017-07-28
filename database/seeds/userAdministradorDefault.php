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
      'name'=>'administrador',
      'password'=>bcrypt('123456'),
      'username'=>'administrador',
    ]);
    DB::table('role_user')->insert(['role_id'=>'1','user_id'=>'1']);
    }
}
