<?php

use Illuminate\Database\Seeder;

class tipoUnidad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'6 1/2','idTipoMaterial'=>'1']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'8 x 10','idTipoMaterial'=>'1']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'10 x 12','idTipoMaterial'=>'1']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'11 x 14','idTipoMaterial'=>'1']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'14 x 14','idTipoMaterial'=>'1']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'Set','idTipoMaterial'=>'2']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'Set','idTipoMaterial'=>'3']);
         DB::table('tipoUnidad')->insert(['nombreTipoUnidad'=>'14 x 17','idTipoMaterial'=>'1']);
    }
}
