<?php

use Illuminate\Database\Seeder;

class departamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Ahuachapán']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Cabañas']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Chalatenango']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Cuscatlán']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Morazán']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'La Libertad']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'La Paz']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'La Unión']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'San Miguel']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'San Salvador']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'San Vicente']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Santa Ana']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Sonsonate']);
      DB::table('departamentos')->insert(['nombreDepartamento'=>'Usulután']);

    }
}
