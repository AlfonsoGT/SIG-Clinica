<?php

use Illuminate\Database\Seeder;

class rolDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(['nombre_rol'=>'Administrador']);
      DB::table('roles')->insert(['nombre_rol'=>'Radiologo']);
      DB::table('roles')->insert(['nombre_rol'=>'Secretaria']);
    }
}
