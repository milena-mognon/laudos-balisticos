<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;


class Carabina extends Model
{
    public static function text($arma)
    {
        if ($arma->num_canos === "dois") {
            $text = self::carabina_dois_canos($arma);
        } else {
            $text = self::carabina($arma);
        }

        $resultado = Shared::funcionamento($arma->funcionamento);
        $fim = "Observação: A carabina acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
        $laudo = array_merge($text, ['resultado' => $resultado, 'fim' => $fim]);

        return $laudo;
    }

    private static function carabina_dois_canos($arma)
    {
        $calibre = $arma->calibre->nome;
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $numeracao_montagem = Shared::numeracao_montagem($arma->numeracao_montagem);
        $modelo = Shared::modelo($arma->modelo);
        $bandoleira = Shared::bandoleira($arma->bandoleira);
        $serie = Shared::serie($arma->tipo_serie, $arma->num_serie);
        $marca = Shared::marca($arma->marca->nome);
        $chave_abertura = Shared::chaveAbertura($arma->chave_abertura);
        $teclas_gatilho = Shared::teclasGatilho($arma->teclas_gatilho);
        $sistema_funcionamento = Shared::sistemaFuncionamento($arma->sistema_funcionamento);
        $origem = mb_strtolower($arma->origem->fabricacao);
        $inicio = "$arma->tipo_arma Marca $marca calibre $calibre: ";
        $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . " $sistema_funcionamento, marca $marca $modelo, fabricação $origem, de calibre nominal $calibre, $serie $numeracao_montagem, com sistema de carregamento tipo $arma->sistema_carregamento, sistema de percussão $arma->sistema_percussao, com $arma->num_canos canos $arma->disposicao_canos e $teclas_gatilho, com sistema de engatilhamento $arma->sistema_engatilhamento. $tipo_acabamento, apresenta coronha e fuste em $arma->coronha_fuste $bandoleira, chave de abertura localizada $chave_abertura, encontra-se em $arma->estado_geral estado de conservação e suas medidas são: comprimento total: " . str_replace(".", ",", $arma->comprimento_total) . "m e o cano mede " . str_replace(".", ",", $arma->comprimento_cano) . "m.";
        return ['inicio' => $inicio, 'corpo' => $corpo];
    }

    private static function carabina($arma)
    {
        $calibre = $arma->calibre->nome;
        $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
        $numeracao_montagem = Shared::numeracao_montagem($arma->numeracao_montagem);
        $modelo = Shared::modelo($arma->modelo);
        $bandoleira = Shared::bandoleira($arma->bandoleira);
        $serie = Shared::serie($arma->tipo_serie, $arma->num_serie);
        $marca = Shared::marca($arma->marca->nome);
        $chave_abertura = Shared::chaveAbertura($arma->chave_abertura);
        $sistema_funcionamento = Shared::sistemaFuncionamento($arma->sistema_funcionamento);
        $origem = mb_strtolower($arma->origem->fabricacao);
        $inicio = "$arma->tipo_arma Marca $marca calibre $calibre: ";
        $corpo = "Trata-se de uma " . mb_strtolower($arma->tipo_arma) . " $sistema_funcionamento, marca $marca $modelo, fabricação $origem, calibre nominal $calibre, $serie $numeracao_montagem, com sistema de carregamento tipo $arma->sistema_carregamento, sistema de percussão $arma->sistema_percussao, $arma->num_canos cano e sistema de engatilhamento $arma->sistema_engatilhamento. $tipo_acabamento, apresenta coronha e fuste em $arma->coronha_fuste $bandoleira, chave de abertura localizada $chave_abertura e encontra-se em $arma->estado_geral estado de conservação. Suas medidas são: comprimento total: " . str_replace(".", ",", $arma->comprimento_total) . "m e o cano mede " . str_replace(".", ",", $arma->comprimento_cano) . "m.";
        return ['inicio' => $inicio, 'corpo' => $corpo];
    }
}
