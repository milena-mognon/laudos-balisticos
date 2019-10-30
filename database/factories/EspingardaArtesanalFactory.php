<?php

use Faker\Generator as Faker;
use App\Models\Arma;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Arma::class, 'Espingarda Artesanal' , function (Faker $faker) {
    $estado_geral = array('Regular','Bom', 'Mau');
    $funcionamento = array('Eficiente','Ineficiente');
    $bandoleira = array('Não Possui', 'Couro', 'Cordelete', 'Nylon');
    $coronha_fuste = array('Madeira', 'Material Sintético', 'Desprovido');
    return [
        'calibre_id' => factory(Calibre::class),
        'calibre_real' => '',
        'laudo_id' => factory(Laudo::class),
        'tipo_arma' => 'Espingarda Artesanal',
        'comprimento_cano' => '0,111',
        'comprimento_total' => '0,222',
        'estado_geral' => $estado_geral[rand(0, 2)],
        'funcionamento' => $funcionamento[rand(0, 1)],
        'num_lacre' => str_random(8),
        'bandoleira' => $bandoleira[rand(0, 3)],
        'coronha_fuste' => $coronha_fuste[rand(0, 2)],
    ];
});