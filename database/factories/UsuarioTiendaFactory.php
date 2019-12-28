<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UsuarioTienda;
use Faker\Generator as Faker;

$factory->define(UsuarioTienda::class, function (Faker $faker) {
    return [
        'idTienda' => $faker->randomElement([1,2,3]),
        'idUsuario' => $faker->randomElement([1,2,3]),
    ];
});
