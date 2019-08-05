<?php

use Faker\Generator as Faker;
use App\Models\Secao;


$factory->define(Secao::class, function (Faker $faker) {
    return [
        'nome' => str_random(10),
    ];
});