<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Venta;
use Faker\Generator as Faker;

$factory->define(Venta::class, function (Faker $faker) {
    return [
        'idTienda' => $faker->randomElement([1,2,3]),
        'idUsuario' => $faker->randomElement([1,2,3]),
        'importe' => $faker->randomFloat(5,0,99999.999),
    ];
});
