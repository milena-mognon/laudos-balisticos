<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Municoes;

use Illuminate\Database\Eloquent\Model;

class Estojo extends Model
{
    public static function text($municao)
    {
        if ($municao->quantidade > 1) {
            $text = self::estojos($municao);
        } else {
            $text = self::estojo($municao);
        }

        return $text;
    }

    private static function estojo($municao)
    {
        $inicio = "Estojo calibre " . $municao->calibre->nome . ":";
        $corpo = " Trata-se de " . converter_numero($municao->quantidade) . " estojo $municao->estojo de calibre nominal " . $municao->calibre->nome . ", marca " . $municao->marca->nome . ".";
        $resultado = "O estojo devidamente identificado e embalado acompanha a primeira via do presente trabalho";
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function estojos($municao)
    {
        $inicio = "Estojos calibre " . $municao->calibre->nome . ":";
        $corpo = " Trata-se de " . converter_numero($municao->quantidade) . " estojos $municao->estojo de calibre nominal " . $municao->calibre->nome . ", marca " . $municao->marca->nome . ".";
        $resultado = "Os estojos devidamente identificados e embalados acompanham a primeira via do presente trabalho.";
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }
}