<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Arma;
use PhpOffice\PhpWord\SimpleType\Jc;

class ArmasText
{
    private $section, $i, $config;

    public function __construct($section, $config, $i)
    {
        $this->section = $section;
        $this->config = $config;
        $this->i = $i;
    }

    public function addText($armas)
    {
        foreach ($armas as $arma) {
            $this->i++;
            $laudo = Arma::arma($arma);
            $textrun = $this->section->addTextRun($this->config->paragraphJustify());
            $text = [$textrun->addText($this->i . "- " . $laudo["inicio"], $this->config->arial12Bold()),
                $textrun->addText($laudo["corpo"], $this->config->arial12()),
                $this->section->addText($laudo["resultado"], $this->config->arial12Underline(), $this->config->paragraphJustify()),
                $this->section->addText($laudo["fim"], $this->config->arial12Bold(), $this->config->paragraphJustify())];
            $this->section->addTextBreak(1);

            $imagens = $arma->imagens;
            if ($imagens->count() > 0) {
                foreach ($imagens as $imagem) {
                    $source = storage_path('imagens/' . $imagem->nome);
                    if (file_exists($source)) {
                        $fileContent = file_get_contents($source);
                        $this->section->addImage($fileContent, array('alignment' => Jc::CENTER, 'width' => 450));
                        $this->section->addTextBreak(2);
                    } else {
                        $this->section->addText("Ocorreu um erro com a imagem.", ['color' => "FF0000", 'size' => 14]);
                    }
                }
            }
        }
        return array('i' => $this->i, 'section' => $this->section);
    }
}
