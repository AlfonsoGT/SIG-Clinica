<?php

use Illuminate\Database\Seeder;

class tipoExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipoExamen')->insert(['nombreTipoExamen'=>'Radiografía de Tórax']);
         DB::table('tipoExamen')->insert(['nombreTipoExamen'=>'Radiografía de Misceláneas']);
         DB::table('tipoExamen')->insert(['nombreTipoExamen'=>'Ultrasonografía Abdominal']);
         DB::table('tipoExamen')->insert(['nombreTipoExamen'=>'Ultrasonografía Ginecológica']);
    }
}
