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
      DB::table('departamentos')->insert(['nombre_departamento'=>'Ahuachapán']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Cabañas']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Chalatenango']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Cuscatlán']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Morazán']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'La Libertad']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'La Paz']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'La Unión']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'San Miguel']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'San Salvador']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'San Vicente']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Santa Ana']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Sonsonate']);
      DB::table('departamentos')->insert(['nombre_departamento'=>'Usulután']);

    }
}
