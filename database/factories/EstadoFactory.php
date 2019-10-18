<?php

use Faker\Generator as Faker;
use App\Models\Estado;


$factory->define(Estado::class, function (Faker $faker) {
    return [
        'nome' => 'Paraná',
    ];
});