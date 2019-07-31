<?php

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Util;
use App\Models\Armas\Shared;


class Espingarda extends Model
{

  public static function text($arma)
  {
    $tipo_acabamento = Shared::acabamento($arma->tipo_acabamento);
    $serie = Shared::serie($arma->num_serie);
    $marca = Shared::marca($arma->marca);
    $resultado = Shared::funcionamento($arma->funcionamento);
    $chave_abertura = Shared::chaveAbertura($arma->chave_abertura);
    $teclas_gatilho = Shared::teclasGatilho($arma->teclas_gatilho);
    $sistema_funcionamento = Shared::sistemaFuncionamento($arma->sistema_funcionamento);

      if($arma->sistema_carregamento=="antecarga"){
        $inicio = "$arma->tipo_arma artesanal: ";
        $corpo = "Trata-se de uma ". mb_strtolower($arma->tipo_arma) ." $sistema_funcionamento, marca $marca, de fabricação " . mb_strtolower($arma->origem). ", de calibre nominal $arma->calibre, $serie, com sistema de carregamento tipo $arma->sistema_carregamento, $arma->num_canos cano, sistema de engatilhamento $arma->sistema_engatilhamento e sistema de percussão $arma->percutor. $tipo_acabamento, apresenta coronha e fuste em $arma->coronha e encontra-se em $arma->estado_geral estado de conservação. Suas medidas são: comprimento total: ".str_replace(".", ",", $arma->comprimento)."m e o cano mede ". str_replace(".", ",", $arma->comprimento_cano)."m.";
      } else {
        $inicio = "$arma->tipo_arma Marca $arma->marca calibre $arma->calibre: ";
        if($arma->num_canos=="dois"){
          $corpo = "Trata-se de uma ". mb_strtolower($arma->tipo_arma) ." $sistema_funcionamento, marca $marca, modelo $arma->modelo, fabricação $arma->origem, de calibre nominal $arma->calibre, $serie, com sistema de carregamento tipo $arma->sistema_carregamento, sistema de percussão $arma->percutor, com $arma->num_canos canos $arma->disposicao_canos e $teclas_gatilho, com sistema de engatilhamento $arma->sistema_engatilhamento. $tipo_acabamento, apresenta coronha e fuste em $arma->coronha, chave de abertura localizada $chave_abertura, encontra-se em $arma->estado_geral estado de conservação e suas medidas são: comprimento total: ".str_replace(".", ",", $arma->comprimento)."m e o cano mede ". str_replace(".", ",", $arma->comprimento_cano)."m.";
        } else {
          $corpo = "Trata-se de uma ". mb_strtolower($arma->tipo_arma) ." $sistema_funcionamento, marca $marca, fabricação $arma->origem, calibre nominal $arma->calibre, $serie, com sistema de carregamento tipo $arma->sistema_carregamento, sistema de percussão $arma->percutor, $arma->num_canos cano e sistema de engatilhamento $arma->sistema_engatilhamento. $tipo_acabamento, apresenta coronha e fuste em $arma->coronha, chave de abertura localizada $chave_abertura e encontra-se em $arma->estado_geral estado de conservação. Suas medidas são: comprimento total: ".str_replace(".", ",", $arma->comprimento)."m e o cano mede ". str_replace(".", ",", $arma->comprimento_cano)."m.";
        }
      }

      $fim = "Observação: A espingarda acima descrita acompanha o presente trabalho devidamente identificada com o lacre nº $arma->num_lacre.";
      $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

      return $laudo;
  }

}
