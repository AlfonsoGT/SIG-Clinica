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
      DB::table('permissions')->insert(['name'=>'Ver Usuarios','slug'=>'ver_usuarios','description'=>'Permiso para poder ver los usuarios registrados']);
      DB::table('permissions')->insert(['name'=>'Crear Usuarios','slug'=>'crear_usuarios','description'=>'Permiso para poder crear nuevos usuarios']);
      DB::table('permissions')->insert(['name'=>'Editar Usuarios','slug'=>'editar_usuarios','description'=>'Permiso para poder editar usuarios registrados']);
      DB::table('permissions')->insert(['name'=>'Borrar Usuarios','slug'=>'borrar_usuarios','description'=>'Permiso para poder borrar usuarios registrados']);


      DB::table('permissions')->insert(['name'=>'control de gestión de roles','slug'=>'control_roles','description'=>'Permiso para poder administrar información de roles y sus permisos']);
      DB::table('permissions')->insert(['name'=>'permiso para agregar o quitar roles a un usuario','slug'=>'modificar_roles','description'=>'Permiso para poder agragar o quitar roles a un suario']);
      DB::table('permissions')->insert(['name'=>'permiso para habilitar o inhabilitar perfil de paciente','slug'=>'modificar_perfil_paciente','description'=>'Permiso para poder habilitar un perfil de paciente ']);

      DB::table('permissions')->insert(['name'=>'Permiso para registro de material utilizado','slug'=>'ingreso_material_salida','description'=>'Permiso para poder ingresar material de salida ']);
      DB::table('permissions')->insert(['name'=>'Permiso para registro de ingreso de material','slug'=>'ingreso_material_entrada','description'=>'Permiso para poder ingresar material de entrada ']);
      DB::table('permissions')->insert(['name'=>'Permiso para generar gráficos','slug'=>'generar_graficos','description'=>'Permiso para poder generar gráficos']);


      DB::table('permissions')->insert(['name'=>'Ver Citas','slug'=>'ver_citas','description'=>'Permiso para poder ver las citas registradas']);
      DB::table('permissions')->insert(['name'=>'Asignar Citas','slug'=>'asignar_citas','description'=>'Permiso para poder asignar citas']);

      DB::table('permissions')->insert(['name'=>'Realizar examenes','slug'=>'realizar_examen','description'=>'Permiso para poder realizar examenes ']);
      DB::table('permissions')->insert(['name'=>'Generar lecturas y documento PDF','slug'=>'generar_lectura','description'=>'Permiso para generar lecturas y documentos PDF']);
      DB::table('permissions')->insert(['name'=>'Ver PDF','slug'=>'ver_pdf','description'=>'Permiso para poder ver los PDF previamente generados']);

      DB::table('permissions')->insert(['name'=>'Ver Pacientes','slug'=>'ver_pacientes','description'=>'Permiso para poder ver los pacientes registrados']);
      DB::table('permissions')->insert(['name'=>'Crear Pacientes','slug'=>'crear_pacientes','description'=>'Permiso para poder registrar pacientes nuevos']);
      DB::table('permissions')->insert(['name'=>'Editar Pacientes','slug'=>'editar_pacientes','description'=>'Permiso para poder editar pacientes registrados']);
      
    }
}
