<?php

namespace App\Models\Gerador;

use Criminalistica\Models\Util;
use PhpOffice\PhpWord\SimpleType\Jc;

class Geral
{

    public static function addText($laudo, $section, $phpWord, $config)
    {
        $header = $section->addHeader();
        $header->addTextBreak(1);
        $page = $header->addPreserveText('FLS. {PAGE}', array('bold' => true, 'size' => 10, 'name' => 'arial'), $config->paragraphRight()); // adiciona contador de folhas

        $num_laudo = "LAUDO Nº $laudo->rep";
        $header->addText($num_laudo, array('bold' => true, 'size' => 10, 'name' => 'arial'), array('alignment' => Jc::RIGHT));
        //$header->addTextBreak(1);

        $intCrim = "INSTITUTO DE CRIMINALÍSTICA";

        $perito = $laudo->perito->nome;
        $diretor = $laudo->diretor->nome;
        $delegacia = $laudo->solicitante->nome;
        $oficio = $laudo->oficio;
//      $cidade = $laudo->cidade->nome;
        $secao = $laudo->secao->nome;

//      $aux = Util::tituloETipoExame($armas, $municoes, $componentes);

        $aux = ['exame' => 'dd'];
        $cabecalho2 = "Em consequência, o Perito procedeu ao exame solicitado, relatando-o com a verdade e com todas as circunstâncias relevantes, da forma como segue:";

        $exame = "DO EXAME DO MATERIAL APRESENTADO";

        $data_solic = data($laudo->data_solicitacao);
        $data_desig = formatar_data_do_bd($laudo->data_designacao);
        //date('d/m/Y', strtotime($rep->data_solicitacao)
        $text = [

//      $section->addText($aux['titulo'], $config->arial14Bold(), $config->paragraphCenter()),
            $textrun = $section->addTextRun($config->paragraphJustify()),
            $textrun->addText("$data_solic, nesta cidade de $secao e no ", $config->arial12()),
            $textrun->addText($intCrim, $config->arial12Bold()),
            $textrun->addText(" do Estado, foi designado pelo Diretor do Instituto, ", $config->arial12()),
            $textrun->addText($diretor, $config->arial12Bold()),
            $textrun->addText(" por indicação do chefe da Seção, o Perito Criminal ", $config->arial12()),
            $textrun->addText($perito, $config->arial12Bold()),
            $textrun->addText(", para proceder ao exame " . $aux['exame'] . ", a fim de ser atendida uma solicitação contida no Ofício nº. ", $config->arial12()),
            $textrun->addText($oficio, $config->arial12Bold()),
            $textrun->addText(", recebido dia $data_desig, oriundo da ", $config->arial12()),
            $textrun->addText($delegacia . ".", $config->arial12Bold()),
            $section->addText($cabecalho2, $config->arial12(), $config->paragraphJustify()),
            $section->addText($exame, $config->arial12Bold(), $config->paragraphJustifyExam()), 'phpWord' => $phpWord];

        return $section;
    }

    public static function addFinalText($perito, $section, $config)
    {
        $textrun = $section->addTextRun($config->paragraphJustify());

        $final = [$textrun->addText("Este laudo foi redigido pelo Perito $perito e disponibilizado em arquivo digital contendo uma folha de rosto e ", $config->arial12(), $config->paragraphJustify()),
            $textrun->addField('NUMPAGES', array(), array()),
            $textrun->addText(" página(s). Por nada mais haver e sendo essas as declarações que tem a fazer, deu-se por findo o exame solicitado que de tudo se lavrou o presente laudo, o qual segue digitalmente assinado.", $config->arial12(), $config->paragraphJustify())];

        return $final;
    }

    public function titulo_e_exame($armas, $municoes, $componentes)
    {
        if (count($armas) == 1 && count($municoes) == 0) {
            $titulo = "LAUDO DE EXAME DE ARMA DE FOGO";
            $exame = "na arma de fogo abaixo descrita";
        } else {
            if (count($armas) == 1 && count($municoes) > 0) {
                $titulo = "LAUDO DE EXAME DE ARMA DE FOGO E MUNIÇÃO";
                $exame = "na arma de fogo e munições abaixo descritas";
            } else {
                if (count($armas) > 1 && count($municoes) > 0) {
                    $titulo = "LAUDO DE EXAME DE ARMA DE FOGO E MUNIÇÃO";
                    $exame = "nas armas de fogo e munições abaixo descritas";
                } else {
                    if (count($armas) > 0 && count($municoes) <= 0) {
                        $titulo = "LAUDO DE EXAME DE ARMAS DE FOGO";
                        $exame = "nas armas de fogo abaixo descritas";
                    } else {
                        if (count($armas) <= 0 && count($municoes) > 0) {
                            $titulo = "LAUDO DE EXAME DE MUNIÇÃO";
                            $exame = "nas munições abaixo descritas";
                        } else {
                            if (count($armas) == 0 && count($municoes) == 0 && count($componentes) > 0) {
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
}