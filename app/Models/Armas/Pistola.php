<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;


class Pistola extends Model
{

    public static function text($arma)
    {
        $calibre = $arma->calibre->nome;
        $origem = mb_strtolower($arma->origem->fabricacao);
        $modelo = Shared::modelo($arma->modelo);
        $numeracao_montagem = Shared::numeracao_montagem($arma->numeracao_montagem);
        $quantidade_raias = converter_numero_raias($arma->quantidade_raias);
        $sentido_raias = Shared::sentido_raias($arma->sentido_raias);
        $capacidade = converter_numero($arma->capacidade_carregador);
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $serie = Shared::serie($arma->tipo_serie, $arma->num_serie);
        $marca = Shared::marca($arma->marca->nome);
        $resultado = Shared::funcionamento($arma->funcionamento);
        $trava_gatilho = self::trava_gatilho($arma->trava_gatilho);
        $trava_ferrolho = self::trava_ferrolho($arma->trava_ferrolho);
        $trava_seguranca = self::trava_seguranca($arma->trava_seguranca);
        $retem_carregador = self::retem_carregador($arma->retem_carregador);

        $inicio = "$arma->tipo_arma $arma->carregamento Marca $marca, $serie:";
        $corpo = " Trata-se de uma ". mb_strtolower($arma->tipo_arma)." $arma->carregamento, de marca $marca,$modelo fabricação $origem, de calibre nominal $calibre, $serie $numeracao_montagem e sistema de disparo com cão $arma->cao. Possui carregador $arma->carregador com capacidade para $capacidade cartuchos, $trava_seguranca $trava_gatilho $trava_ferrolho $retem_carregador. $tipo_acabamento e cabo de $arma->cabo. Encontra-se em $arma->estado_geral estado de conservação e possui as seguintes medidas: comprimento total: $arma->comprimento_total m; altura: $arma->altura m; o cano mede: $arma->comprimento_cano m de comprimento e apresenta internamente $quantidade_raias raias $sentido_raias em $arma->estado_geral estado de conservação.";

        $fim = "Observação: A pistola acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }

    private static function trava_seguranca($trava_seguranca)
    {
        switch ($trava_seguranca) {
            case 'ambidestro':
                return 'com trava de segurança ambidestra,';
                break;
            case 'lado direito':
                return 'com trava de segurança no lado direito,';
                break;
            case 'lado esquerdo':
                return 'com trava de segurança no lado esquerdo,';
                break;
            case 'não possui':
                return 'sem trava de segurança,';
                break;
            default:
                return '';
        }
    }

    private static function trava_gatilho($trava_gatilho)
    {
        switch ($trava_gatilho) {
            case 'ambidestro':
                return 'trava de gatilho ambidestra,';
                break;
            case 'lado direito':
                return 'trava de gatilho no lado direito,';
                break;
            case 'lado esquerdo':
                return 'trava de gatilho no lado esquerdo,';
                break;
            case 'não se aplica':
                return 'sem trava de gatilho,';
                break;
            default:
                return '';
        }
    }

    private static function trava_ferrolho($trava_ferrolho)
    {
        switch ($trava_ferrolho) {
            case 'ambidestro':
                return 'trava de ferrolho ambidestra,';
                break;
            case 'lado direito':
                return 'trava de ferrolho no lado direito,';
                break;
            case 'lado esquerdo':
                return 'trava de ferrolho no lado esquerdo,';
                break;
            case 'não se aplica':
                return 'sem trava de ferrolho,';
                break;
            default:
                return '';
        }
    }

    private static function retem_carregador($retem_carregador)
    {
        switch ($retem_carregador) {
            case 'ambidestro':
                return 'e retém do carregador ambidestro';
                break;
            case 'lado direito':
                return 'e retém do carregador no lado direito';
                break;
            case 'lado esquerdo':
                return 'e retém do carregador no lado esquerdo';
                break;
            default:
                return '';
        }
    }
}
