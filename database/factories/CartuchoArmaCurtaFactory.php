<?php

use Faker\Generator as Faker;
use App\Models\Municao;
use App\Models\Origem;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Municao::class, 'Cartucho Arma Curta' , function (Faker $faker) {
    $funcionamento = array('Eficiente','Ineficiente');
    $tipo_projetil = array('Encamisado', 'Semi-encamisado', 'Chumbo nu');
    $projetil = array('Ponta Ogival','Ponta Plana', 'Ponta Oca' ,'Canto-vivo ','Semi canto-vivo');
    $estojo = array('Metálico', 'Plástico com Culote Metálico' ,'Papelão com Culote Metálico');

    return [
        'marca_id' => factory(Marca::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'funcionamento' => $funcionamento[rand(0, 1)],
        'tipo_projetil' => $tipo_projetil[rand(0, 2)],
        'projetil' => $projetil[rand(0, 4)],
        'estojo' => $estojo[rand(0, 2)],
        'quantidade' => '3',
        'tipo_municao' => 'Cartucho', 
        'municao_de' => 'arma curta'
    ];
});