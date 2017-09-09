<?php

use Illuminate\Database\Seeder;

class permisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->insert(['name'=>'control de gestión de pacientes','slug'=>'control_pacientes','description'=>'control']);
      DB::table('permissions')->insert(['name'=>'control de gestión de citas','slug'=>'control_citas','description'=>'control']);
      DB::table('permissions')->insert(['name'=>'control de gestión de usuarios','slug'=>'control_usuarios','description'=>'control']);
      DB::table('permissions')->insert(['name'=>'control de gestión de roles','slug'=>'control_roles','description'=>'control']);
      DB::table('permissions')->insert(['name'=>'permiso para agregar o quitar roles a un usuario','slug'=>'modificar_roles','description'=>'control']);
      DB::table('permissions')->insert(['name'=>'permiso para habilitar o inhabilitar perfil de paciente','slug'=>'modificar_perfil_paciente','description'=>'control']);


    }
}
