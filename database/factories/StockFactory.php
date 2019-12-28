<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'cantidadDeseada' => $faker->randomNumber(3,true),
        'cantidadDisponible' => $faker->randomNumber(3,true),
        'precioVenta' => $faker->randomFloat(4, 0,9999.99),
    ];
});
