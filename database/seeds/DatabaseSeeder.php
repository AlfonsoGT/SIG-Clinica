<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Seeds con información por default (no descomentar)
    $this->call(sexoSeeder::class);
    $this->call(procedenciaSeeder::class);
    $this->call(rolDefaultSeeder::class);
    $this->call(userAdministradorDefault::class);
    $this->call(permisoSeeder::class);


    // Seeders para pruebas con información (no descomentar)

    $this->call(pacientes::class);
    $this->call(tipoExamenSeeder::class);
    $this->call(regionAnatomicaSeeder::class);
     $this->call(citaSeeder::class);
    }
}
