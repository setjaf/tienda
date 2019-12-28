<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'marca' => $faker->word,
        'descripcion' => $faker->sentence(15, true)
    ];
});
