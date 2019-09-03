<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use App\Models\Util;
use Illuminate\Database\Eloquent\Model;


class Pistola extends Model
{

    public static function text($arma) // configurar texto para pistola
    {
        $quant_raias = Util::converterRaias($arma->quant_raias);
        $capacidade = Util::converter($arma->capacidade_carregador);
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $serie = Shared::serie($arma->num_serie);
        $marca = Shared::marca($arma->marca);
        $resultado = Shared::funcionamento($arma->funcionamento);

        $inicio = "$arma->tipo_arma $arma->func_tiro Marca $arma->marca, Nº de Série $arma->num_serie:";
        $corpo = " Trata-se de uma $arma->tipo_arma $arma->func_tiro, de marca $marca, modelo $arma->modelo, fabricação $arma->origem, de calibre nominal $arma->calibre, $serie e sistema de disparo com cão $arma->cao. Possui carregador $arma->carregador com capacidade para $capacidade cartuchos, dotada de trava de segurança $arma->posicao_trava, trava de gatilho $arma->trava_gatilho, retem do carregador $arma->retem_carregador e trava de ferrolho $arma->trava_ferrolho. Apresenta acabamento $arma->tipo_acabamento e cabo de $arma->cabo. Encontra-se em $arma->estado_geral estado de conservação e possui as seguintes medidas: comprimento total: $arma->comprimento m; altura: $arma->altura m; o cano mede: $arma->comprimento_cano m de comprimento e apresenta internamente $quant_raias raias $arma->sentido_raias em $arma->estado_geral estado de conservação.";

        $fim = "Observação: A pistola acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }
}
