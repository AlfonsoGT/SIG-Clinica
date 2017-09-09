<?php

use Illuminate\Database\Seeder;

class tipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipoProducto')->insert(['nombreTipoProducto'=>'Placas']);
         DB::table('tipoProducto')->insert(['nombreTipoProducto'=>'Gel para las Ultras']);
         DB::table('tipoProducto')->insert(['nombreTipoProducto'=>'Revelador']);
    }
}
