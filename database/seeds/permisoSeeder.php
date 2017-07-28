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
      DB::table('permissions')->insert(['name'=>'puede ver','slug'=>'puede_ver']);
      DB::table('permissions')->insert(['name'=>'puede eliminar','slug'=>'puede_eliminar']);
      DB::table('permissions')->insert(['name'=>'puede cargar','slug'=>'puede_cargar']);
      DB::table('permissions')->insert(['name'=>'puede editar','slug'=>'puede_editar']);
      DB::table('permissions')->insert(['name'=>'puede modificar usuarios','slug'=>'puede_modificar_usuarios']);


    }
}
