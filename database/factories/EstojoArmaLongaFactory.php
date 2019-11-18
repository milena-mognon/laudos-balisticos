<?php

use Faker\Generator as Faker;
use App\Models\Municao;
use App\Models\Marca;
use App\Models\Calibre;
use App\Models\Laudo;

$factory->defineAs(Municao::class, 'Estojo Arma Longa' , function (Faker $faker) {
    $estojo = array('Metálico', 'Plástico com Culote Metálico' ,'Papelão com Culote Metálico');

    return [
        'marca_id' => factory(Marca::class),
        'calibre_id' => factory(Calibre::class),
        'laudo_id' => factory(Laudo::class),
        'funcionamento' => 'Eficiente',
        'estojo' => $estojo[rand(0, 2)],
        'quantidade' => '3',
        'tipo_municao' => 'estojo', 
        'municao_de' => 'arma longa'
    ];
});