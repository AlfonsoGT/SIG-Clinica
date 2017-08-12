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
      'duiPaciente'=>$faker->unique()->bothify($string = '########-#'),
       'primerNombre'=>$faker->firstName,
       'segundoNombre'=>$faker->firstName,
      'primerApellido'=>$faker->lastName,
       'segundoApellido'=>$faker->lastName,
       'fechaNacimiento'=>$faker->dateTime,
      'numeroCelular'=>$faker->bothify($string = '########'),
      'duiEncargado'=>null,
       'nombreEncargado'=>null,
      'idSexo'=>$faker->randomElement(['1','2']),
       'idProcedencia'=>$faker->randomElement(['1','2','3','4','5','6','7','8','9','10','11','12','13']),
       'idDepartamento'=>$faker->randomElement(['1','2','3','4','5','6','7','8','9','10','11','12','13','14']),
    ];
});
