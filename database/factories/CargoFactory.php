<?php

use Faker\Generator as Faker;
use App\Models\Cargo;


$factory->define(Cargo::class, function (Faker $faker) {
    return [
        'nome' => 'Administrador',
    ];
});