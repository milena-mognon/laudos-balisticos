<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Calibre;
use App\Models\Municao;
use App\Models\Util;
use Illuminate\Database\Eloquent\Model;

class MunicoesText extends Model
{
    private static $i;

    public static function addText($municoes, $section, $config, $i)
    {
        dd($municoes);
        // grupo de munições separado por calibre
        $grupoMunicoes = Municao::findCalibreGroup($id)->toArray();
        //dd($grupoMunicoes);
        foreach ($grupoMunicoes as $quant) {
            // se quantidade maior que 1 e calibre diferente de null
            // entra no if para ser uma tabela
            if ($quant->teste > 1 && $quant->calibre_id <> null) {

                $i++;
                // encontra todas as informações do calibre (nome, id, ...)
                $calibre = Calibre::find($quant->calibre_id);
                // primeiro encontra a quantidade total de munições do mesmo calibre, tipo e laudo
                // depois converte este número para escrito (por extenso)
                $quantTotal = Util::converter(Municao::quantidadeTotal($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento));

                // inicia a sessão do texto (escrita antes da tabela)
                $textrun = $section->addTextRun($config->paragraphJustify());
                $textrun->addText($i . " - Cartuchos Calibre $calibre->calibre:", $config->arial12Bold());
                $textrun->addText(" Trata-se de $quantTotal cartuchos intactos conforme tabela abaixo:", $config->arial12());
                //$section->addTextBreak(1);
                // cria uma tabela
                $table = $section->addTable($config->tabelaConfig());

                $table->addRow(500);
                $table->addCell(1550)->addText("Quantidade", $config->fonteTabela(), $config->cellCenter());
                $table->addCell(1550)->addText("Calibre", $config->fonteTabela(), $config->cellCenter());
                $table->addCell(1550)->addText("Marca", $config->fonteTabela(), $config->cellCenter());
                $table->addCell(1550)->addText("Origem", $config->fonteTabela(), $config->cellCenter());
                $table->addCell(1550)->addText("Estojo/Espoleta", $config->fonteTabela(), $config->cellCenter());
                $table->addCell(1550)->addText("Projétil", $config->fonteTabela(), $config->cellCenter());
                // faz um array com todas as informações das munições de mesmo tipo, calibre e laudo
                $sameCalibre = Municao::sameCalibre($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento)->toArray();
                // popula a tabela
                foreach ($sameCalibre as $municao) {
                    $table->addRow(500);
                    $table->addCell(1550)->addText(ucfirst($municao->quantidade), $config->fonteTabela(), $config->cellCenter());
                    $table->addCell(1550)->addText(ucfirst($municao->calibre), $config->fonteTabela(), $config->cellCenter());
                    $table->addCell(1550)->addText(ucfirst($municao->marca), $config->fonteTabela(), $config->cellCenter());
                    $table->addCell(1550)->addText(ucfirst($municao->origem), $config->fonteTabela(), $config->cellCenter());
                    $table->addCell(1550)->addText(ucfirst($municao->estojo), $config->fonteTabela(), $config->cellCenter());
                    $table->addCell(1550)->addText(ucfirst($municao->projetil . "/ " . $municao->tipo_projetil), $config->fonteTabela(), $config->cellCenter());
                }
                $section->addTextBreak(1);
                $section->addText("Submetidas estas munições à prova de disparo, foi observado o funcionamento normal dos seus componentes. Foram utilizados para os tiros de prova, todos os cartuchos encaminhados, os quais deflagraram as respectivas cargas de projeção ao serem as espoletas percutidas por uma só vez.", $config->arial12Underline(), $config->paragraphJustify());
                $section->addTextBreak(1);
            }


        } // end foreach

        foreach ($grupoMunicoes as $quant) {
            if ($quant->teste == 1) {
                $sameCalibre = Municao::sameCalibre($id, $quant->calibre_id, $quant->tipo, $quant->funcionamento)->toArray();
                //dd($sameCalibre);
                foreach ($sameCalibre as $municao) {
                    //dd($municao);
                    if ($municao->tipo == "estojo") {
                        $i++;
                        $laudo = Municao::estojo($municao);
                        $textrun = $section->addTextRun($config->paragraphJustify());
                        $text = [$textrun->addText($i . "- " . $laudo["inicio"], $config->arial12Bold()),
                            $textrun->addText($laudo["corpo"], $config->arial12()),
                            $section->addTextBreak(1),
                            $section->addText($laudo["resultado"], $config->arial12Underline(), $config->paragraphJustify()),
                            $section->addTextBreak(1)];
                    }
                    if ($municao->tipo == "cartucho") {
                        $i++;
                        $laudo = Municao::municao($municao);
                        $textrun = $section->addTextRun($config->paragraphJustify());
                        $text = [$textrun->addText($i . "- " . $laudo["inicio"], $config->arial12Bold()),
                            $textrun->addText($laudo["corpo"], $config->arial12()),
                            $section->addTextBreak(1),
                            $section->addText($laudo["resultado"], $config->arial12Underline(), $config->paragraphJustify()),
                            $section->addText($laudo["fim"], $config->arial12Bold(), $config->paragraphJustify())];
                        $section->addTextBreak(1);
                    }
                }
            }
        }
        return array('i' => $i, 'section' => $section);
    }

    private static function cabecalho_tabela($section, $config){
        //$section->addTextBreak(1);
        // cria uma tabela
        $table = $section->addTable($config->tabelaConfig());

        $table->addRow(500);
        $table->addCell(1550)->addText("Quantidade", $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText("Calibre", $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText("Marca", $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText("Origem", $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText("Estojo/Espoleta", $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText("Projétil", $config->fonteTabela(), $config->cellCenter());

    }

    private static function conteudo_tabela($table, $config, $municao){
        $table->addRow(500);
        $table->addCell(1550)->addText(ucfirst($municao->quantidade), $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->calibre), $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->marca), $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->origem), $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->estojo), $config->fonteTabela(), $config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->projetil . "/ " . $municao->tipo_projetil), $config->fonteTabela(), $config->cellCenter());
    }

    private static function individual(){

    }

    private static function estojo(){

    }

    private static function cartucho(){

    }

    private static function projetil(){

    }
}
