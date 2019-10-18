<?php

use Faker\Generator as Faker;
use App\Models\Diretor;


$factory->define(Diretor::class, function (Faker $faker) {
    return [
        'nome' => mb_strtolower($faker->name),
        'inicio_direcao' => '2015-03-26',
        'fim_direcao' =>    '2019-04-02',
    ];
});