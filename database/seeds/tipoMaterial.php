<?php

use Illuminate\Database\Seeder;

class tipoMaterial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipoMaterial')->insert(['nombreTipoMaterial'=>'Placa']);
         DB::table('tipoMaterial')->insert(['nombreTipoMaterial'=>'Revelador']);
         DB::table('tipoMaterial')->insert(['nombreTipoMaterial'=>'Fijador']);
    }
}
