<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProveedorProducto;
use Faker\Generator as Faker;

$factory->define(ProveedorProducto::class, function (Faker $faker) {
    return [
        'idProducto'=>$faker->randomElement([1,2,3]),
        'idProveedor'=>$faker->randomElement([1,2,3]),
    ];
});
