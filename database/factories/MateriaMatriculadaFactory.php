<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materiamatriculada;
use Faker\Generator as Faker;

$factory->define(Materiamatriculada::class, function (Faker $faker) {
    return [
        'alumno' => $faker->randomDigit,
        'materia' => $faker->randomDigit,
        'grupo' => $faker->randomDigit,
    ];
});
