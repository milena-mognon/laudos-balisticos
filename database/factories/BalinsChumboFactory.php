<?php

use Faker\Generator as Faker;
use App\Models\Componente;
use App\Models\Laudo;

$factory->defineAs(Componente::class, 'Balins de Chumbo' , function (Faker $faker) {
    $material_frasco = array('Material Sintético', 'Metálico', 'Plástico');
    return [
        'laudo_id' => factory(Laudo::class),
        'quantidade' => '125',
        'componente' => 'Balins de Chumbo', 
        'quantidade_frascos' => '2',
        'material_frascos' => $material_frasco[rand(0, 2)],
        // 'tamanho' => '6,25'
    ];
});