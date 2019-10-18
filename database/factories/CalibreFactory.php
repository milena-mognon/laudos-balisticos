<?php

use Faker\Generator as Faker;
use App\Models\Calibre;


$factory->define(Calibre::class, function (Faker $faker) {
    return [
        'nome' => ucfirst(str_random(10)),
        'tipo_arma' => ucfirst(str_random(10))
    ];
});