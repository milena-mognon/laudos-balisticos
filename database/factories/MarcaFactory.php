<?php

use Faker\Generator as Faker;
use App\Models\Marca;


$factory->define(Marca::class, function (Faker $faker) {
    return [
        'nome' => str_random(10),
        'categoria' => str_random(10)
    ];
});