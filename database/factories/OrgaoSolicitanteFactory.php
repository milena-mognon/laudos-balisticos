<?php

use Faker\Generator as Faker;
use App\Models\OrgaoSolicitante;
use App\Models\Cidade;

$factory->define(OrgaoSolicitante::class, function (Faker $faker) {
    return [
        'nome' => mb_strtolower($faker->name),
        'cidade_id' => factory(Cidade::class),
    ];
});
