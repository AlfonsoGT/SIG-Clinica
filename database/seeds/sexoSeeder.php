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
  DB::table('sexo')->insert(['nombre_sexo'=>'Masculino']);
  DB::table('sexo')->insert(['nombre_sexo'=>'Femenino']);

    }
}
