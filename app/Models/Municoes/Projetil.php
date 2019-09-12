<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Municoes;

use Illuminate\Database\Eloquent\Model;


class Projetil extends Model
{
    public static function text($municao)
    {


        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }


    public static function municao($municao){
        $quantidade = Util::converter($municao->quantidade); // numero por extenso
        if(strstr($municao->calibre, "GA")=="GA"){

            if($municao->quantidade==1){
                $inicio="Cartucho calibre $municao->calibre:";
                if($municao->nao_deflagrado=="true"){
                    $corpo=" Trata-se de $quantidade cartucho percutido e não deflagrado da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituído de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
                    $naoDeflagrou = true;
                } else {
                    $corpo=" Trata-se de $quantidade cartucho intacto da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituído de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
                    $naoDeflagrou = false;
                }
                $singular = true;
            } else {
                $inicio="Cartuchos calibre $municao->calibre:";
                if($municao->nao_deflagrado=="true"){
                    $corpo=" Trata-se de $quantidade cartuchos percutidos e não deflagrados da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituídos de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
                    $naoDeflagrou = true;
                }else{
                    $corpo=" Trata-se de $quantidade cartuchos intactos da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituídos de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
                    $naoDeflagrou = false;
                }
                $singular = false;
            }
        } else {
            if($municao->quantidade==1){
                $inicio="Cartucho calibre $municao->calibre:";
                if($municao->nao_deflagrado=="true"){
                    $corpo=" Trata-se de $quantidade cartucho percutido e não deflagrado da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituído de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
                    $naoDeflagrou = true;
                } else {
                    $corpo=" Trata-se de $quantidade cartucho intacto da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituído de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
                    $naoDeflagrou = false;
                }
                $singular = true;
            } else {
                $inicio="Cartuchos calibre $municao->calibre:";
                if($municao->nao_deflagrado=="true"){
                    $corpo=" Trata-se de $quantidade cartuchos percutidos e não deflagrados da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituídos de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
                    $naoDeflagrou = true;
                } else {
                    $corpo=" Trata-se de $quantidade cartuchos intactos da marca $municao->marca, fabricação $municao->origem e calibre nominal $municao->calibre, constituídos de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
                    $naoDeflagrou = false;
                }
                $singular = false;
            }
        }

        if($singular){
            if($naoDeflagrou){
                $resultadoIneficiente = "O cartucho devidamente embalado e identificado acompanha a primeira via do presente trabalho.";
            } else {
                $resultadoEficiente = "Submetida esta munição à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.";
                $resultadoIneficiente = "Submetida esta munição à prova de disparo, foi observado o funcionamento anormal dos seus componentes,estando a mesma ineficiete";
            }
        } else {
            if($naoDeflagrou){
                $resultadoIneficiente = "Os cartuchos devidamente embalados e identificados acompanham a primeira via do presente trabalho.";
            } else {
                $resultadoEficiente = "Submetidas estas munições à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.";
                $resultadoIneficiente = "Submetidas estas munições à prova de disparo, foi observado o funcionamento anormal dos seus componentes, estando as mesmas ineficientes.";
            }
        }



        if($municao->funcionamento == 'eficiente'){
            $resultado = $resultadoEficiente;
        }
        if($municao->funcionamento == 'ineficiente'){
            $resultado = $resultadoIneficiente;
        }
        $fim="";

        $laudo = ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado, 'fim' => $fim];

        return $laudo;
    }
}
