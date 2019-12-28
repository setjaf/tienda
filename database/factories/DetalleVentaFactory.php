<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DetalleVenta;
use Faker\Generator as Faker;

$factory->define(DetalleVenta::class, function (Faker $faker) {
    return [        
        'precioFinal' => $faker->randomFloat(4,0,9999.99),
        'precioVenta' => $faker->randomFloat(4,0,9999.99),
    ];
});
