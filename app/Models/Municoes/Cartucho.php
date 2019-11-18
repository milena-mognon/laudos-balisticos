<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Municoes;

use Illuminate\Database\Eloquent\Model;


class Cartucho extends Model
{
    private static $quantidade, $marca, $calibre;

    public static function text($municao)
    {
        self::$quantidade = $municao->quantidade;
        self::$marca = $municao->marca->nome;
        self::$calibre = $municao->calibre->nome;

        if ($municao->municao_de == "arma longa") {
            $text = self::cartucho_arma_longa($municao);
        } else {
            $text = self::cartucho_arma_curta($municao);
        }

        $fim = "";
        $laudo = array_merge($text, ['fim' => $fim]);

        return $laudo;
    }

    private static function cartucho_arma_curta($municao)
    {
        switch (self::$quantidade) {
            case self::$quantidade > 1 && $municao->nao_deflagrou == false:
                return self::cartuchos_arma_curta_deflagrados($municao);
                break;
            case self::$quantidade == 1 && $municao->nao_deflagrou == false:
                return self::cartucho_arma_curta_deflagrado($municao);
                break;
            case self::$quantidade > 1 && $municao->nao_deflagrou == true:
                return self::cartuchos_arma_curta_nao_deflagrados($municao);
                break;
            case self::$quantidade == 1 && $municao->nao_deflagrou == true:
                return self::cartucho_arma_curta_nao_deflagrado($municao);
                break;
        }
    }

    private static function cartucho_arma_longa($municao)
    {
        switch (self::$quantidade) {
            case self::$quantidade > 1 && $municao->nao_deflagrou == false:
                return self::cartuchos_arma_longa_deflagrados($municao);
                break;
            case self::$quantidade == 1 && $municao->nao_deflagrou == false:
                return self::cartucho_arma_longa_deflagrado($municao);
                break;
            case self::$quantidade > 1 && $municao->nao_deflagrou == true:
                return self::cartuchos_arma_longa_nao_deflagrados($municao);
                break;
            case self::$quantidade == 1 && $municao->nao_deflagrou == true:
                return self::cartucho_arma_longa_nao_deflagrado($municao);
                break;
        }
    }

    /*---- Cartucho(s) de Arma Curta ------*/

    private static function cartucho_arma_curta_deflagrado($municao)
    {
        $inicio = "Cartucho calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartucho intacto da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituído de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
        $resultado = self::funcionamento_cartucho($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartuchos_arma_curta_deflagrados($municao)
    {
        $inicio = "Cartuchos calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartuchos intactos da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituídos de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
        $resultado = self::funcionamento_cartuchos($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartucho_arma_curta_nao_deflagrado($municao)
    {
        $inicio = "Cartucho calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartucho percutido e não deflagrado da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituído de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
        $resultado = self::funcionamento_cartucho($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartuchos_arma_curta_nao_deflagrados($municao)
    {
        $inicio = "Cartuchos calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartuchos percutidos e não deflagrados da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituídos de estojo $municao->estojo, com projétil $municao->tipo_projetil e $municao->projetil.";
        $resultado = self::funcionamento_cartuchos($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }


    /*---- Cartucho(s) de Arma Longa ------*/

    private static function cartucho_arma_longa_deflagrado($municao)
    {
        $inicio = "Cartucho calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartucho intacto da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituído de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
        $resultado = self::funcionamento_cartucho($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartuchos_arma_longa_deflagrados($municao)
    {
        $inicio = "Cartuchos calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartuchos intactos da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituídos de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
        $resultado = self::funcionamento_cartuchos($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartucho_arma_longa_nao_deflagrado($municao)
    {
        $inicio = "Cartucho calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartucho percutido e não deflagrado da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituído de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
        $resultado = self::funcionamento_cartucho($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    private static function cartuchos_arma_longa_nao_deflagrados($municao)
    {
        $inicio = "Cartuchos calibre " . self::$calibre . ":";
        $corpo = " Trata-se de " . converter_numero(self::$quantidade) . " cartuchos percutidos e não deflagrados da marca " . self::$marca . " e calibre nominal " . self::$calibre . ", constituídos de estojo $municao->estojo, com carga de projeção em $municao->projetil.";
        $resultado = self::funcionamento_cartuchos($municao->funcionamento);
        return ['inicio' => $inicio, 'corpo' => $corpo, 'resultado' => $resultado];
    }

    /* -- Funcionamento -- */
    public static function funcionamento_cartucho($funcionamento)
    {
        if ($funcionamento == 'eficiente') {
            return 'Submetida esta munição à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.';
        }
        if ($funcionamento == 'ineficiente') {
            return 'Submetida esta munição à prova de disparo, foi observado o funcionamento anormal dos seus componentes, estando a mesma ineficiete';
        }
    }

    public static function funcionamento_cartuchos($funcionamento)
    {
        if ($funcionamento == 'eficiente') {
            return 'Submetidas estas munições à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.';
        }
        if ($funcionamento == 'ineficiente') {
            return 'Submetidas estas munições à prova de disparo, foi observado o funcionamento anormal dos seus componentes, estando as mesmas ineficientes.';
        }
    }
}