<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Municoes;

use Illuminate\Database\Eloquent\Model;


class Projetil extends Model
{
    public static function text($municao)
    {


        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }
}
