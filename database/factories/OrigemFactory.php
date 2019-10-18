<?php

use Faker\Generator as Faker;
use App\Models\Origem;


$factory->define(Origem::class, function (Faker $faker) {
    return [
        'nome' => $faker->country,
        'fabricacao' => ucfirst(str_random(10))
    ];
});