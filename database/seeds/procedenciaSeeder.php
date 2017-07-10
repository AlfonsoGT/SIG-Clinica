<?php

use Illuminate\Database\Seeder;

class procedenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Ciencias Económicas']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Ciencias Naturales y Matemática']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Ciencias y Humanidades']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Ciencias Agronómicas']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Ingeniería y Arquitectura']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Jurisprudencia y Ciencias Sociales']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Medicina']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Odontología']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad de Química y Farmacia']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad Multidisciplinaria de Occidente']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad Multidisciplinaria Oriental']);
      DB::table('procedencia')->insert(['nombre_procedencia'=>'Facultad Multidisciplinaria Paracentral']);
    }
}
