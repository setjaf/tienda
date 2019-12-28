<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proveedor;
use Faker\Generator as Faker;

$factory->define(Proveedor::class, function (Faker $faker) {
    return [
        'idTienda'=>$faker->randomElement([1,2,3]),
        'nombre'=>$faker->name,
        'saldo'=>$faker->randomFloat(5,0,99999.999),
    ];
});
