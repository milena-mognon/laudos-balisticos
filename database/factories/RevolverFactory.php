<?php

use Faker\Generator as Faker;
use App\Models\Arma;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Arma::class, 'Revolver' , function (Faker $faker) {
    $sistema_percussao = array('direta', 'indireta', 'com engatilhamento embutido');
    $estado_geral = array('Regular','Bom', 'Mau');
    $tambor_rebate = array('Esquerda', 'Direita');
    $funcionamento = array('Eficiente','Ineficiente');
    $sentido_raias = array('Dextrógiro', 'Sinistrógiro', 'Danificado');
    $cabo = array('Chifre', 'Desprovido', 'Madrepérola', 'Madeira', 'Material Sintético');
    $tipo_acabamento = array('Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado');
    return [
        'marca_id' => factory(Marca::class),
        'origem_id' => factory(Origem::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'tipo_serie' => 'Legível',
        'num_serie' => str_random(10),
        'modelo' => str_random(10),
        'quantidade_raias' => '3',
        'comprimento_cano' => '0,111',
        'comprimento_total' => '0,222',
        'altura' => '0,333',
        'sistema_percussao' => $sistema_percussao[rand(0, 2)],
        'tambor_rebate' => $tambor_rebate[rand(0, 1)],
        'capacidade_tambor' => '6',
        'estado_geral' => $estado_geral[rand(0, 2)],
        'funcionamento' => $funcionamento[rand(0, 1)],
        'sentido_raias' => $sentido_raias[rand(0, 2)],
        'cabo' => $cabo[rand(0, 4)],
        'tipo_acabamento' => $tipo_acabamento[rand(0, 4)],
        'tipo_arma' => 'Revólver',
        'num_lacre' => str_random(8),
        'numeracao_montagem' => str_random(10),
    ];
});