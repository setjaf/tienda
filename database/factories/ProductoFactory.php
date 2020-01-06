<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'id' => $faker->numerify('#############'),
        'producto' => $faker->word,
        'idCategoria' => $faker->randomDigitNotNull,
        'idMarca' => $faker->randomDigitNotNull,
        'unidadMedida' => $faker->randomElement([1,2,3]),
        'formaVenta' => $faker->randomElement([1,2]),
        'tamano' => $faker->randomFloat(3,0,999),
    ];
});
