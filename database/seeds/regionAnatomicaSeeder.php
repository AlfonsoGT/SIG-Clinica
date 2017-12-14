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
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Torax',
            'idTipoExamen' => '1',]);
         //Misacelaneas
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Cuello',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Hombro',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Brazo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Codo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Antebrazo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Muñeca',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Mano',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Gluteo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Muslo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Rodilla',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Pierna',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Tobillo',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Pie',
            'idTipoExamen' => '2',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Cabeza',
            'idTipoExamen' => '2',]);
         //Ultra abdomen
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Abdomen',
            'idTipoExamen' => '3',]);
         //Ultra Ginecologica
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Ovarios',
            'idTipoExamen' => '4',]);
         DB::table('regionAnatomica')->insert(['nombreRegionAnatomica'=>'Útero',
            'idTipoExamen' => '4',]);
    }
}
