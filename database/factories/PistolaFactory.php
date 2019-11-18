<?php

use Faker\Generator as Faker;
use App\Models\Arma;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Arma::class, 'Pistola' , function (Faker $faker) {
    $estado_geral = array('Regular','Bom', 'Mau');
    $funcionamento = array('Eficiente','Ineficiente');
    $sentido_raias = array('Dextrógiro', 'Sinistrógiro', 'Danificado');
    $cabo = array('Chifre', 'Desprovido', 'Madrepérola', 'Madeira', 'Material Sintético');
    $tipo_acabamento = array('Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado');
    $trava_ferrolho = array('Ambidestro', 'Lado Direito', 'Lado Esquerdo', 'Não se Aplica');
    $trava_seguranca = array('Ambidestro', 'Lado Direito', 'Lado Esquerdo', 'Não Possui');
    $trava_gatilho = array('Ambidestro', 'Lado Direito', 'Lado Esquerdo', 'Não se Aplica');
    $cao = array('Exposto', 'Mecanismo Embutido');
    $retem_carregador = array('Ambidestro', 'Lado Direito', 'Lado Esquerdo');
    $carregamento = array('Automática', 'Semi-automática');
    $carregador = array('Monofilar', 'Bifilar');
    return [
        'marca_id' => factory(Marca::class),
        'origem_id' => factory(Origem::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'modelo' => str_random(10),
        'tipo_serie' => 'Legível',
        'num_serie' => str_random(10),
        'quantidade_raias' => '3',
        'comprimento_cano' => '0,111',
        'comprimento_total' => '0,222',
        'altura' => '0,333',
        'estado_geral' => $estado_geral[rand(0, 2)],
        'funcionamento' => $funcionamento[rand(0, 1)],
        'sentido_raias' => $sentido_raias[rand(0, 2)],
        'capacidade_carregador' => '6',
        'cabo' => $cabo[rand(0, 4)],
        'tipo_acabamento' => $tipo_acabamento[rand(0, 4)],
        'tipo_arma' => 'Pistola',
        'num_lacre' => str_random(8),
        'numeracao_montagem' => str_random(10),
        'cao' => $cao[rand(0, 1)],
        'retem_carregador' => $retem_carregador[rand(0, 2)],
        'trava_ferrolho' => $trava_ferrolho[rand(0, 3)],
        'trava_gatilho' => $trava_gatilho[rand(0, 3)],
        'trava_seguranca' => $trava_seguranca[rand(0, 3)],
        'carregamento' => $retem_carregador[rand(0, 1)],
        'carregador' => $carregador[rand(0, 1)],

    ];
});