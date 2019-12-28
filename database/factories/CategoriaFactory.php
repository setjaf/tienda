<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'categoria' => $faker->word,
        'descripcion' => $faker->sentence(5, true),
    ];
});
