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
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'7']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'8']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'9']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'10']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'11']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'12']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'13']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'14']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'15']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'16']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'17']);
    DB::table('permission_role')->insert(['role_id'=>'1','permission_id'=>'18']);
    


    }
}
