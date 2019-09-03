<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use App\Models\Util;
use Illuminate\Database\Eloquent\Model;


class Garrucha extends Model
{

    public static function text($arma)
    {

        $quant_raias = Util::converterRaias($arma->quant_raias);
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $serie = Shared::serie($arma->num_serie);
        $marca = Shared::marca($arma->marca);
        $resultado = Shared::funcionamento($arma->funcionamento);
        $chave_abertura = Shared::chaveAbertura($arma->chave_abertura);
        $teclas_gatilho = Shared::teclasGatilho($arma->teclas_gatilho);

        $inicio = "$arma->tipo_arma calibre nominal $arma->calibre: ";;

        if ($arma->num_canos == "dois") {
            $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . ", $serie, marca $marca, fabricação $arma->origem, calibre nominal $arma->calibre. A referida arma é dotada de $arma->num_canos canos $arma->disposicao_canos, cães $arma->cao" . "s" . " e sistema de percussão $arma->percutor" . "s" . ", $teclas_gatilho, cabo $arma->cabo com as placas laterais em material $arma->placas_laterais, com chave de abertura e basculação do cano localizada $chave_abertura, $tipo_acabamento e em $arma->estado_geral estado de conservação. A arma possui as seguintes medidas: comprimento total: " . str_replace(".", ",", $arma->comprimento) . " m; altura: " . str_replace(".", ",", $arma->altura) . "m; o cano mede: " . str_replace(".", ",", $arma->comprimento_cano) . "m de comprimento e apresenta internamente $quant_raias raias $arma->sentido_raias em $arma->estado_geral estado de conservação.";
        } else {
            $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . ", $serie, marca $marca, fabricação $arma->origem, calibre $arma->calibre. A referida arma é dotada de $arma->num_canos cano, cão $arma->cao e sistema de percussão $arma->percutor, $teclas_gatilho, cabo $arma->cabo com as placas laterais em material $arma->placas_laterais, com chave de abertura e basculação do cano localizada $chave_abertura, $tipo_acabamento e em $arma->estado_geral estado de conservação. A arma possui as seguintes medidas: comprimento total: " . str_replace(".", ",", $arma->comprimento) . " m; altura: " . str_replace(".", ",", $arma->altura) . "m; o cano mede: " . str_replace(".", ",", $arma->comprimento_cano) . "m de comprimento e apresenta internamente $quant_raias raias $arma->sentido_raias em $arma->estado_geral estado de conservação.";
        }

        $fim = "Observação: A garrucha acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }
}
