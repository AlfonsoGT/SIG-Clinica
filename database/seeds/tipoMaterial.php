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
         DB::table('tipomaterial')->insert(['nombreTipoMaterial'=>'Placa']);
         DB::table('tipomaterial')->insert(['nombreTipoMaterial'=>'Revelador']);
         DB::table('tipomaterial')->insert(['nombreTipoMaterial'=>'Fijador']);
    }
}
