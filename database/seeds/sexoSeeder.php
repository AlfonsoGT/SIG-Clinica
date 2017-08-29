<?php

use Illuminate\Database\Seeder;

class sexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  DB::table('sexo')->insert(['nombreSexo'=>'Masculino']);
  DB::table('sexo')->insert(['nombreSexo'=>'Femenino']);

    }
}
