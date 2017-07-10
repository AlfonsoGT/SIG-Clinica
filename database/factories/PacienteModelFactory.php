<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
  $factory->define(App\Paciente::class, function (Faker\Generator $faker) {


    return [
      'duiPaciente'=>str_random(10),
       'primerNombre'=>$faker->name,
       'segundoNombre'=>$faker->name,
      'primerApellido'=>$faker->name,
       'segundoApellido'=>$faker->name,
       'fechaNacimiento'=>date('Y-m-d'),
      'numeroCelular'=>'78747522',
      'duiEncargado'=>null,
       'nombreEncargado'=>null,
      'idSexo'=>$faker->randomElement(['1','2']),
       'idProcedencia'=>'1',
    ];
});
