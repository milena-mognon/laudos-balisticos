<?php

use Faker\Generator as Faker;
use App\Models\Laudo;
use App\Models\Cidade;
use App\Models\OrgaoSolicitante;
use App\Models\Secao;
use App\Models\Diretor;
use App\Models\User;

$factory->define(Laudo::class, function (Faker $faker) {
    return [
        'rep' => str_random(8),
        'oficio' => str_random(8),
        'cidade_id' => factory(Cidade::class),
        'solicitante_id' => factory(OrgaoSolicitante::class),
        'indiciado' => str_random(15),
        'inquerito' => str_random(8),
        'tipo_inquerito' => str_random(6),
        'secao_id' => factory(Secao::class),
        'perito_id' => factory(User::class),
        'diretor_id' => factory(Diretor::class),
        'data_solicitacao' => '16/10/2019',
        'data_designacao' => '20/10/2019'
    ];
});