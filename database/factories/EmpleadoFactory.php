<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'codigo' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'nombre' => $faker->name,
        'apellidos' => $faker->word,
        'direccion' => $faker->address,
        'dni' => $faker->numberBetween($min = 10000000, $max = 90000000),
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'departamento' => $faker->state,
        'ciudad' => $faker->city,
        'foto' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
