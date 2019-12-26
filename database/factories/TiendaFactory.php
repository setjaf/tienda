<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tienda;
use Faker\Generator as Faker;

$factory->define(Tienda::class, function (Faker $faker) {
    return [
        'idUsuario' => 1,
        'nombre' => $faker->word,
        'calle' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'cp' => $faker->postcode,
        'balance' => $faker->randomFloat(5,0,9999.99),
    ];
});
