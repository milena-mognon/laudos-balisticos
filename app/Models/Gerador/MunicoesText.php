<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Municoes\Cartucho;
use App\Models\Municoes\Estojo;
use Illuminate\Database\Eloquent\Model;

class MunicoesText extends Model
{
    private static $section, $i, $config;

    public static function addText($municoes, $section, $config, $i)
    {
        self::$section = $section;
        self::$i = $i;
        self::$config = $config;
        $grupos_municoes = self::grupos_municoes($municoes);
        $grupo_por_calibre = self::grupo_por_calibre($grupos_municoes);
//        $grupo_por_tipo_municao = self::grupo_por_tipo_municao($grupo_por_calibre);

//        foreach ($grupos_municoes as $grupo) {
//
////            self::grupo_por_calibre($grupo);
//            dd($grupo);
//            // se quantidade maior que 1 e calibre diferente de null
//            // entra no if para ser uma tabela
//            if ($quant->teste > 1 && $quant->calibre_id <> null) {
//
//                $i++;
//                // encontra todas as informações do calibre (nome, id, ...)
//                $calibre = Calibre::find($quant->calibre_id);
//                // primeiro encontra a quantidade total de munições do mesmo calibre, tipo e laudo
//                // depois converte este número para escrito (por extenso)
//                $quantTotal = Util::converter(Municao::quantidadeTotal($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento));
//
//                // inicia a sessão do texto (escrita antes da tabela)
//                $textrun = $section->addTextRun($config->paragraphJustify());
//                $textrun->addText($i . " - Cartuchos Calibre $calibre->calibre:", $config->arial12Bold());
//                $textrun->addText(" Trata-se de $quantTotal cartuchos intactos conforme tabela abaixo:", $config->arial12());
//                //$section->addTextBreak(1);
//                // cria uma tabela
//                $table = $section->addTable($config->tabelaConfig());
//
//                $table->addRow(500);
//                $table->addCell(1550)->addText("Quantidade", $config->fonteTabela(), $config->cellCenter());
//                $table->addCell(1550)->addText("Calibre", $config->fonteTabela(), $config->cellCenter());
//                $table->addCell(1550)->addText("Marca", $config->fonteTabela(), $config->cellCenter());
//                $table->addCell(1550)->addText("Origem", $config->fonteTabela(), $config->cellCenter());
//                $table->addCell(1550)->addText("Estojo/Espoleta", $config->fonteTabela(), $config->cellCenter());
//                $table->addCell(1550)->addText("Projétil", $config->fonteTabela(), $config->cellCenter());
//                // faz um array com todas as informações das munições de mesmo tipo, calibre e laudo
//                $sameCalibre = Municao::sameCalibre($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento)->toArray();
//                // popula a tabela
//                foreach ($sameCalibre as $municao) {
//                    $table->addRow(500);
//                    $table->addCell(1550)->addText(ucfirst($municao->quantidade), $config->fonteTabela(), $config->cellCenter());
//                    $table->addCell(1550)->addText(ucfirst($municao->calibre), $config->fonteTabela(), $config->cellCenter());
//                    $table->addCell(1550)->addText(ucfirst($municao->marca), $config->fonteTabela(), $config->cellCenter());
//                    $table->addCell(1550)->addText(ucfirst($municao->origem), $config->fonteTabela(), $config->cellCenter());
//                    $table->addCell(1550)->addText(ucfirst($municao->estojo), $config->fonteTabela(), $config->cellCenter());
//                    $table->addCell(1550)->addText(ucfirst($municao->projetil . "/ " . $municao->tipo_projetil), $config->fonteTabela(), $config->cellCenter());
//                }
//                $section->addTextBreak(1);
//                $section->addText("Submetidas estas munições à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.", $config->arial12Underline(), $config->paragraphJustify());
//                $section->addTextBreak(1);
//            }
//
//
//        } // end foreach
//
//        foreach ($grupoMunicoes as $quant) {
//            if ($quant->teste == 1) {
//                $sameCalibre = Municao::sameCalibre($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento)->toArray();
//                //dd($sameCalibre);
//                foreach ($sameCalibre as $municao) {
//                    //dd($municao);
//                    if ($municao->tipo == "estojo") {
//                        $i++;
//                        $laudo = Municao::estojo($municao);
//                        $textrun = $section->addTextRun($config->paragraphJustify());
//                        $text = [$textrun->addText($i . "- " . $laudo["inicio"], $config->arial12Bold()),
//                            $textrun->addText($laudo["corpo"], $config->arial12()),
//                            $section->addTextBreak(1),
//                            $section->addText($laudo["resultado"], $config->arial12Underline(), $config->paragraphJustify()),
//                            $section->addTextBreak(1)];
//                    }
//                    if ($municao->tipo == "cartucho") {
//                        $i++;
//                        $laudo = Municao::municao($municao);
//                        $textrun = $section->addTextRun($config->paragraphJustify());
//                        $text = [$textrun->addText($i . "- " . $laudo["inicio"], $config->arial12Bold()),
//                            $textrun->addText($laudo["corpo"], $config->arial12()),
//                            $section->addTextBreak(1),
//                            $section->addText($laudo["resultado"], $config->arial12Underline(), $config->paragraphJustify()),
//                            $section->addText($laudo["fim"], $config->arial12Bold(), $config->paragraphJustify())];
//                        $section->addTextBreak(1);
//                    }
//                }
//            }
//        }
        return array('i' => $i, 'section' => self::$section);
    }

    private static function cabecalho_tabela()
    {
        self::$i++;
        $textrun = self::$section->addTextRun(self::$config->paragraphJustify());
        $textrun->addText(self::$i . " - TIPO MUNICAO Calibre CALIBRE:", self::$config->arial12Bold());
        $textrun->addText(" Trata-se de XXXXXX cartuchos intactos conforme tabela abaixo:", self::$config->arial12());
        $table = self::$section->addTable(self::$config->tabelaConfig());

        $table->addRow(500);
        $table->addCell(1550)->addText("Quantidade", self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText("Calibre", self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText("Marca", self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText("Estojo/Espoleta", self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText("Projétil", self::$config->fonteTabela(), self::$config->cellCenter());
        return $table;
    }

    private static function conteudo_tabela($table, $municao)
    {
        $table->addRow(500);
        $table->addCell(1550)->addText(ucfirst($municao['quantidade']), self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->calibre->nome), self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->marca->nome), self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->estojo), self::$config->fonteTabela(), self::$config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->projetil . "/ " . $municao->tipo_projetil), self::$config->fonteTabela(), self::$config->cellCenter());
    }

    private static function individual($municao)
    {
        switch ($municao->tipo_municao) {
            case 'cartucho':
                self::cartucho($municao);
                break;
            case 'estojo':
                self::estojo($municao);
                break;
            case 'projétil':
                self::projetil($municao);
                break;
        }
    }

    private static function estojo($municao)
    {
        self::$i++;
        $laudo = Estojo::text($municao);
        $textrun = self::$section->addTextRun(self::$config->paragraphJustify());
        $text = [$textrun->addText(self::$i . "- " . $laudo["inicio"], self::$config->arial12Bold()),
            $textrun->addText($laudo["corpo"], self::$config->arial12()),
            self::$section->addTextBreak(1),
            self::$section->addText($laudo["resultado"], self::$config->arial12Underline(), self::$config->paragraphJustify()),
            self::$section->addTextBreak(1)];
    }

    private static function cartucho($municao)
    {
        self::$i++;
        $laudo = Cartucho::text($municao);
        $textrun = self::$section->addTextRun(self::$config->paragraphJustify());
        $text = [$textrun->addText(self::$i . "- " . $laudo["inicio"], self::$config->arial12Bold()),
            $textrun->addText($laudo["corpo"], self::$config->arial12()),
            self::$section->addTextBreak(1),
            self::$section->addText($laudo["resultado"], self::$config->arial12Underline(), self::$config->paragraphJustify()),
            self::$section->addText($laudo["fim"], self::$config->arial12Bold(), self::$config->paragraphJustify())];
        self::$section->addTextBreak(1);
    }

    private static function projetil()
    {

    }

    private static function grupos_municoes($municoes)
    {
        $grupos_municoes = $municoes->groupBy([
            'calibre_id',
            function ($item) {
                return $item['tipo_municao'];
            },
            function ($item) {
                return $item['funcionamento'];
            },
        ], $preserveKeys = true);
        return $grupos_municoes;
    }

    private static function grupo_por_calibre($grupos_municoes)
    {
//        dd($grupos_municoes);
        foreach ($grupos_municoes as $grupo_calibre) {
//            dd($grupo_calibre);
            self::grupo_por_tipo_municao($grupo_calibre);
        }
    }


    private static function grupo_por_tipo_municao($grupos_municoes)
    {
//        dd($grupos_municoes);
        foreach ($grupos_municoes as $grupo_tipo_municao) {
//            dd($grupo_tipo_municao);
            self::grupo_por_funcionamento($grupo_tipo_municao);
        }
    }

    private static function grupo_por_funcionamento($municoes)
    {
        foreach ($municoes as $grupo) {
            if (count($grupo) > 1) {
                $table = self::cabecalho_tabela();
                foreach ($grupo as $municao) {
                    self::conteudo_tabela($table, $municao);
                }
            } else {
                foreach ($grupo as $municao) {
                    self::individual($municao);
                }

            }
        }
    }
}
