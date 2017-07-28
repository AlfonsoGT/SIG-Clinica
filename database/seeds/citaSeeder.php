<?php

use Illuminate\Database\Seeder;

class citaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('citas')->insert([
        	'fechaCita'=>'2017-07-17',
        	'horaCita' => '09:00:00',
        	'idTipoExamen' => '1',
        	]);
       DB::table('citas')->insert([
        	'fechaCita'=>'2017-07-18',
        	'horaCita' => '12:00:00',
        	'idTipoExamen' => '2',
        	]);
        DB::table('citas')->insert([
        	'fechaCita'=>'2017-07-19',
        	'horaCita' => '11:00:00',
        	'idTipoExamen' => '3',
        	]);
        DB::table('citas')->insert([
        	'fechaCita'=>'2017-07-20',
        	'horaCita' => '10:00:00',
        	'idTipoExamen'=> '4',

        	]);
    }
}
