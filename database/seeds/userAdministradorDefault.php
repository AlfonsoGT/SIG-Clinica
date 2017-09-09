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
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'1']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'2']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'3']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'4']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'5']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'6']);

    }
}
