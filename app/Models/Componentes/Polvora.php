<?php
/*
 * Developed by Milena Mognon
 */

namespace App\Models\Componentes;


class Polvora
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

        $corpo = "Trata-se de $quantidade_frascos $frasco $material_frasco, contendo ".str_replace(',0', '',$componente->quantidade) . "g de ". mb_strtolower($componente->componente) ." no seu interior.";

        $laudo = ['inicio' => $inicio, 'corpo' => $corpo];

        return $laudo;
    }
}
