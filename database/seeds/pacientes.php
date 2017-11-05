<?php

use Illuminate\Database\Seeder;

class pacientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Paciente::class,100)->create();
    }
}
