<?php

use Faker\Generator as Faker;
use App\Models\Arma;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Arma::class, 'Espingarda' , function (Faker $faker) {
    $sistema_percussao = array('direta', 'indireta', 'com engatilhamento embutido');
    $estado_geral = array('Regular','Bom', 'Mau');
    $funcionamento = array('Eficiente','Ineficiente');
    $tipo_acabamento = array('Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado');
    $bandoleira = array('Não Possui', 'Couro', 'Cordelete', 'Nylon');
    $tipo_carregador = array('Tubular Justaposto', 'Outro');
    $chave_abertura = array('Região Superior ao Delgado', 'Região Anterior ao Guarda-Mato', 'Guarda-Mato', 'Lateral Esquerda', 'Lateral Direita');
    $coronha_fuste = array('Madeira', 'Material Sintético', 'Desprovido');
    $sistema_engatilhamento = array('Manual','Mecanismos Embutidos', 'Telha Corrediça');
    $sistema_carregamento = array('Retro-carga', 'Antecarga');
    $sistema_funcionamento = array('Unitário', 'Repetição', 'Semi-automático', 'Automático');
    $disposicao_canos = array('Justapostos', 'Sobrepostos');
    return [
        'marca_id' => factory(Marca::class),
        'origem_id' => factory(Origem::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'tipo_arma' => 'Espingarda',
        'tipo_serie' => 'Legível',
        'num_serie' => str_random(10),
        'comprimento_cano' => '0,111',
        'comprimento_total' => '0,222',
        'sistema_percussao' => $sistema_percussao[rand(0, 2)],
        'estado_geral' => $estado_geral[rand(0, 2)],
        'funcionamento' => $funcionamento[rand(0, 1)],
        'tipo_acabamento' => $tipo_acabamento[rand(0, 4)],
        'num_canos' => 'Uma',
        'disposicao_canos' => '',
        'num_lacre' => str_random(8),
        'numeracao_montagem' => str_random(10),
        'bandoleira' => $bandoleira[rand(0, 3)],
        'tipo_carregador' => $tipo_carregador[rand(0, 1)],
        'chave_abertura' => $chave_abertura[rand(0, 4)],
        'coronha_fuste' => $coronha_fuste[rand(0, 2)],
        'sistema_engatilhamento' => $sistema_engatilhamento[rand(0, 2)],
        'sistema_carregamento' => $sistema_carregamento[rand(0, 1)],
        'teclas_gatilho' => '1',
        'sistema_funcionamento' => $sistema_funcionamento[rand(0, 3)]
    ];
});