<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;


class Garrucha extends Model
{

    private static $calibre, $origem, $quantidade_raias, $tipo_acabamento,
        $serie, $marca, $resultado, $chave_abertura, $teclas_gatilho;

    public static function text($arma)
    {
        self::$calibre = $arma->calibre->nome;
        self::$origem = mb_strtolower($arma->origem->fabricacao);
        self::$quantidade_raias = converter_numero($arma->quantidade_raias);
        self::$tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        self::$serie = Shared::serie($arma->tipo_serie, $arma->num_serie);
        self::$marca = Shared::marca($arma->marca->nome);
        self::$resultado = Shared::funcionamento($arma->funcionamento);
        self::$chave_abertura = Shared::chaveAbertura($arma->chave_abertura);
        self::$teclas_gatilho = Shared::teclasGatilho($arma->teclas_gatilho);

        $inicio = "$arma->tipo_arma calibre nominal ". self::$calibre.": ";

        if ($arma->num_canos == "dois") {
            $corpo = self::garrucha_dois_canos($arma);
        } else {
            $corpo = self::garrucha_um_cano($arma);
        }

        $fim = "Observação: A garrucha acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => self::$resultado, 'fim' => $fim];

        return $laudo;
    }

    private static function garrucha_dois_canos($arma)
    {
        $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . " ," . self::$serie . ", marca " . self::$marca . ", fabricação " . self::$origem . ", calibre nominal " . self::$calibre . ". A referida arma é dotada de $arma->num_canos canos $arma->disposicao_canos, cães $arma->cao" . "s" . " e sistema de percussão $arma->sistema_percussao, " . self::$teclas_gatilho . ", cabo $arma->cabo com as placas laterais em material $arma->placas_laterais, com chave de abertura e basculação do cano localizada " . self::$chave_abertura . ". " . self::$tipo_acabamento . " e em $arma->estado_geral estado de conservação. A arma possui as seguintes medidas: comprimento total: $arma->comprimento_total" . "m; altura: $arma->altura " . "m; o cano mede: $arma->comprimento_cano" . "m de comprimento e apresenta internamente " . self::$quantidade_raias . " raias $arma->sentido_raias em $arma->estado_geral estado de conservação.";
        return $corpo;
    }

    private static function garrucha_um_cano($arma)
    {
        $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . " ," . self::$serie . ", marca " . self::$marca . ", fabricação " . self::$origem . ", calibre nominal " . self::$calibre . ". A referida arma é dotada de $arma->num_canos cano, cão $arma->cao e sistema de percussão $arma->sistema_percussao," . self::$teclas_gatilho . ", cabo $arma->cabo com as placas laterais em material $arma->placas_laterais, com chave de abertura e basculação do cano localizada " . self::$chave_abertura . ". " . self::$tipo_acabamento . " e em $arma->estado_geral estado de conservação. A arma possui as seguintes medidas: comprimento total: $arma->comprimento_total" . "m; altura: $arma->altura " . "m; o cano mede: $arma->comprimento_cano" . "m de comprimento e apresenta internamente " . self::$quantidade_raias . " raias $arma->sentido_raias em $arma->estado_geral estado de conservação.";
        return $corpo;
    }
}
