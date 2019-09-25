<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use PhpOffice\PhpWord\SimpleType\Jc;

class Geral
{
    private $section, $config, $phpWord;

    public function __construct($section, $config, $phpWord)
    {
        $this->section = $section;
        $this->config = $config;
        $this->phpWord = $phpWord;
    }

    public function addText($laudo)
    {
        $header = $this->section->addHeader();
        $header->addTextBreak(1);
        $header->addPreserveText('FLS. {PAGE}', array('bold' => true,
            'size' => 10, 'name' => 'arial'), $this->config->paragraphRight());

        $num_laudo = "LAUDO Nº $laudo->rep";
        $header->addText($num_laudo, array('bold' => true,
            'size' => 10, 'name' => 'arial'), array('alignment' => Jc::END));

        $intCrim = "INSTITUTO DE CRIMINALÍSTICA";

        $perito = $laudo->perito->nome;
        $diretor = $laudo->diretor->nome;
        $delegacia = $laudo->solicitante->nome;
        $oficio = $laudo->oficio;
        $secao = $laudo->secao->nome;

        $aux = $this->titulo_e_exame(
            $laudo->armas()->count(),
            $laudo->municoes()->count(),
            $laudo->componentes()->count());
        $cabecalho2 = "Em consequência, o Perito procedeu ao exame solicitado, relatando-o com a verdade e com todas as circunstâncias relevantes, da forma como segue:";

        $exame = "DO EXAME DO MATERIAL APRESENTADO";

        $data_solic = data($laudo->data_solicitacao);
        $data_desig = formatar_data_do_bd($laudo->data_designacao);

        $text = [
            $this->section->addText($aux['titulo'], $this->config->arial14Bold(), $this->config->paragraphCenter()),
            $textrun = $this->section->addTextRun($this->config->paragraphJustify()),
            $textrun->addText("$data_solic, nesta cidade de $secao e no ", $this->config->arial12()),
            $textrun->addText($intCrim, $this->config->arial12Bold()),
            $textrun->addText(" do Estado, foi designado pelo Diretor do Instituto, ", $this->config->arial12()),
            $textrun->addText($diretor, $this->config->arial12Bold()),
            $textrun->addText(" por indicação do chefe da Seção, o Perito Criminal ", $this->config->arial12()),
            $textrun->addText($perito, $this->config->arial12Bold()),
            $textrun->addText(", para proceder ao exame " . $aux['exame'] . ", a fim de ser atendida uma solicitação contida no Ofício nº. ", $this->config->arial12()),
            $textrun->addText($oficio, $this->config->arial12Bold()),
            $textrun->addText(", recebido dia $data_desig, oriundo da ", $this->config->arial12()),
            $textrun->addText($delegacia, $this->config->arial12Bold()),
            $this->inquerito($textrun, $laudo->tipo_inquerito, $laudo->inquerito),
            $this->indiciado($textrun, $laudo->indiciado),
            $this->section->addText($cabecalho2, $this->config->arial12(), $this->config->paragraphJustify()),
            $this->section->addText($exame, $this->config->arial12Bold(), $this->config->paragraphJustifyExam()), 'phpWord' => $this->phpWord];

        return $this->section;
    }

    public function addFinalText($perito)
    {
        $textrun = $this->section->addTextRun($this->config->paragraphJustify());

        $final = [$textrun->addText("Este laudo foi redigido pelo Perito $perito e disponibilizado em arquivo digital contendo uma folha de rosto e ", $this->config->arial12(), $this->config->paragraphJustify()),
            $textrun->addField('NUMPAGES', array(), array()),
            $textrun->addText(" página(s). Por nada mais haver e sendo essas as declarações que tem a fazer, deu-se por findo o exame solicitado que de tudo se lavrou o presente laudo, o qual segue digitalmente assinado.", $this->config->arial12(), $this->config->paragraphJustify())];

        return $final;
    }

    private function titulo_e_exame($armas, $municoes, $componentes)
    {
        if ($armas == 1 && $municoes == 0) {
            $titulo = "LAUDO DE EXAME DE ARMA DE FOGO";
            $exame = "na arma de fogo abaixo descrita";
        } else {
            if ($armas == 1 && $municoes > 0) {
                $titulo = "LAUDO DE EXAME DE ARMA DE FOGO E MUNIÇÃO";
                $exame = "na arma de fogo e munições abaixo descritas";
            } else {
                if ($armas > 1 && $municoes > 0) {
                    $titulo = "LAUDO DE EXAME DE ARMA DE FOGO E MUNIÇÃO";
                    $exame = "nas armas de fogo e munições abaixo descritas";
                } else {
                    if ($armas > 0 && $municoes <= 0) {
                        $titulo = "LAUDO DE EXAME DE ARMAS DE FOGO";
                        $exame = "nas armas de fogo abaixo descritas";
                    } else {
                        if ($armas <= 0 && $municoes > 0) {
                            $titulo = "LAUDO DE EXAME DE MUNIÇÃO";
                            $exame = "nas munições abaixo descritas";
                        } else {
                            if ($armas == 0 && $municoes == 0 && $componentes > 0) {
                                $titulo = "LAUDO DE EXAME DE CONSTATAÇÃO";
                                $exame = "nos componentes abaixo descritos";
                            }
                        }
                    }
                }
            }
        }
        return ['exame' => $exame, 'titulo' => $titulo];
    }

    private function indiciado($textrun, $indiciado)
    {
        if ($indiciado == '') {
            return $textrun;
        } else {
            [$textrun->addText(", e tendo como indiciado ", $this->config->arial12()),
                $textrun->addText($indiciado . ".", $this->config->arial12Bold())];
            return $textrun;
        }
    }

    private function inquerito($textrun, $tipo_inquerito, $inquerito)
    {
        if ($tipo_inquerito == '') {
            return $textrun->addText('.', $this->config->arial12());
        } else {
            [$textrun->addText(", referente ao $tipo_inquerito nº ", $this->config->arial12()),
                $textrun->addText($inquerito, $this->config->arial12Bold())];
            return $textrun;
        }

    }
}
