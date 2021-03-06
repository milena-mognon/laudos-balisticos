<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;


class Revolver extends Model
{
    public static function text($arma)
    {
        $calibre = $arma->calibre->nome;
        $origem = mb_strtolower($arma->origem->fabricacao);
        $modelo = Shared::modelo($arma->modelo);
        $numeracao_montagem = Shared::numeracao_montagem($arma->numeracao_montagem);
        $quantidade_raias = converter_numero_raias($arma->quantidade_raias);
        $sentido_raias = Shared::sentido_raias($arma->sentido_raias);
        $capacidade = converter_numero($arma->capacidade_tambor);
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $serie = Shared::serie($arma->tipo_serie, $arma->num_serie);
        $marca = Shared::marca($arma->marca->nome);
        $resultado = Shared::funcionamento($arma->funcionamento);

        $inicio = "$arma->tipo_arma calibre nominal $calibre: ";

        $corpo = "Trata-se de um " . mb_strtolower($arma->tipo_arma) . ", de marca $marca,$modelo fabricação $origem, calibre nominal $calibre, $serie,$numeracao_montagem possui tambor reversível para $arma->tambor_rebate, com capacidade para $capacidade cartuchos e sistema de percussão $arma->sistema_percussao. $tipo_acabamento e encontra-se em $arma->estado_geral estado de conservação, apresentando as seguintes medidas: - comprimento total: " . str_replace(".", ",", $arma->comprimento_total) . " m; altura: " . str_replace(".", ",", $arma->altura) . "m; o cano mede: " . str_replace(".", ",", $arma->comprimento_cano) . "m de comprimento e apresenta internamente $quantidade_raias raias $sentido_raias em $arma->estado_geral estado de conservação.";

        $fim = "Observação: O revólver acima descrito acompanha o presente trabalho devidamente identificado com o lacre nº $arma->num_lacre.";

        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }
}
