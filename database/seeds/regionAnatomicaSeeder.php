<?php

use Illuminate\Database\Seeder;

class regionAnatomicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Torax
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Torax',
            'idTipoExamen' => '1',]);
         //Misacelaneas
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Cuello',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Hombro',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Brazo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Codo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Antebrazo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Muñeca',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Mano',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Gluteo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Muslo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Rodilla',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Pierna',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Tobillo',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Pie',
            'idTipoExamen' => '2',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Cabeza',
            'idTipoExamen' => '2',]);
         //Ultra abdomen
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Abdomen',
            'idTipoExamen' => '3',]);
         //Ultra Ginecologica
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Ovarios',
            'idTipoExamen' => '4',]);
         DB::table('regionanatomica')->insert(['nombreRegionAnatomica'=>'Útero',
            'idTipoExamen' => '4',]);
    }
}
