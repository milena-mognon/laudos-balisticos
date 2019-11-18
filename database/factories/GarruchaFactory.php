<?php

use Faker\Generator as Faker;
use App\Models\Arma;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Arma::class, 'Garrucha' , function (Faker $faker) {
    $sistema_percussao = array('direta', 'indireta', 'com engatilhamento embutido');
    $estado_geral = array('Regular','Bom', 'Mau');
    $funcionamento = array('Eficiente','Ineficiente');
    $tipo_acabamento = array('Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado');
    $chave_abertura = array('Região Superior ao Delgado', 'Região Anterior ao Guarda-Mato', 'Guarda-Mato', 'Lateral Esquerda', 'Lateral Direita');
    $disposicao_canos = array('Justapostos', 'Sobrepostos');
    $cao = array('Exposto', 'Mecanismo Embutido');
    $cabo = array('Chifre', 'Desprovido', 'Madrepérola', 'Madeira', 'Material Sintético');
    $placas_laterais = array('Desprovido', 'Sintético');
    $sentido_raias = array('Dextrógiro', 'Sinistrógiro', 'Danificado');

    return [
        'marca_id' => factory(Marca::class),
        'origem_id' => factory(Origem::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'tipo_arma' => 'Garrucha',
        'tipo_serie' => 'Legível',
        'num_serie' => str_random(10),
        'comprimento_cano' => '0,111',
        'comprimento_total' => '0,222',
        'altura' => '0,111',
        'sistema_percussao' => $sistema_percussao[rand(0, 2)],
        'estado_geral' => $estado_geral[rand(0, 2)],
        'funcionamento' => $funcionamento[rand(0, 1)],
        'tipo_acabamento' => $tipo_acabamento[rand(0, 4)],
        'num_canos' => 'Uma',
        'disposicao_canos' => '',
        'num_lacre' => str_random(8),
        'numeracao_montagem' => str_random(10),
        'chave_abertura' => $chave_abertura[rand(0, 4)],
        'teclas_gatilho' => '1',
        'cao' => $cao[rand(0, 1)],
        'placas_laterais' => $placas_laterais[rand(0, 1)],
        'sentido_raias' => $sentido_raias[rand(0, 2)],
        'quantidade_raias' => '3',
        'cabo' => $cabo[rand(0, 4)],
    ];

});