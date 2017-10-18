<?php

use Illuminate\Database\Seeder;

class tipoPlacaSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('placa')->insert(['tipoPlaca'=>'8x10']);
    DB::table('placa')->insert(['tipoPlaca'=>'10x12']);
    DB::table('placa')->insert(['tipoPlaca'=>'11x14']);
    DB::table('placa')->insert(['tipoPlaca'=>'14x14']);
    DB::table('placa')->insert(['tipoPlaca'=>'14x17']);



  }
}
