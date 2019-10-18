<?php

use Faker\Generator as Faker;
use App\Models\Marca;


$factory->define(Marca::class, function (Faker $faker) {
    $categorias = array('Armas', 'Munições');
    $rand = rand(0, 1);
    return [
        'nome' => ucfirst(str_random(10)),
        'categoria' => $categorias[$rand]
    ];
});