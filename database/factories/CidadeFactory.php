<?php

use Faker\Generator as Faker;
use App\Models\Cidade;
use App\Models\Estado;


$factory->define(Cidade::class, function (Faker $faker) {
    return [
        'nome' => $faker->city,
        'estado_id' => factory(Estado::class),
    ];
});