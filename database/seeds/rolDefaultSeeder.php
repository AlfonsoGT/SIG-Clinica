<?php

use Illuminate\Database\Seeder;

class rolDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(['name'=>'Administrador']);
      DB::table('roles')->insert(['name'=>'Recepcionista']);
      DB::table('roles')->insert(['name'=>'Radiologo']);
    }
}
