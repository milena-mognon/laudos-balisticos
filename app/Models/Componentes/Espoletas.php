<?php
/*
 * Developed by Milena Mognon
 */

namespace App\Models\Componentes;

class Espoletas
{
    public static function text($componente)
    {
        $quantidade_frascos = converter_numero($componente->quantidade_frascos);
        $material_frasco = Shared::material($componente->material_frascos, $componente->quantidade_frascos);

        if ($quantidade_frascos == "um") {
            $frasco = "frasco";
        } else {
            $frasco = "frascos";
        }
        $inicio = ucfirst($frasco) . " contendo $componente->componente: ";

        $corpo = "Trata-se de $quantidade_frascos $frasco $material_frasco, contendo $componente->quantidade ". mb_strtolower($componente->componente) ." de $componente->tamanho" . "mm.";

        $laudo = ['inicio' => $inicio, 'corpo' => $corpo];

        return $laudo;
    }
}
