<?php

use Faker\Generator as Faker;
use App\Models\Marca;


$factory->define(Marca::class, function (Faker $faker) {
    return [
        'nome' => ucfirst(str_random(10)),
        'categoria' => ucfirst(str_random(10))
    ];
});