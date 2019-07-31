<?php

namespace App\Models\Gerador;

use App\Models\Arma;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Shared\Converter;


class ArmasText extends Model
{
  public static function addText($armas, $section, $phpWord, $config, $i)
	{
//	    dd($armas);
		foreach ($armas as $arma) {

          $i++;
          $laudo = Arma::arma($arma);
            $textrun = $section->addTextRun($config->paragraphJustify());
            $text = [$textrun->addText($i."- ".$laudo["inicio"], $config->arial12Bold()),
            $textrun->addText($laudo["corpo"], $config->arial12()),
            $section->addText($laudo["resultado"], $config->arial12Underline(), $config->paragraphJustify()),
            $section->addText($laudo["fim"], $config->arial12Bold(), $config->paragraphJustify())];
            $section->addTextBreak(1);

            if($arma->ref_imagem<>null && $arma->ref_imagem<>"")
            {
              $source = "upload/$arma->ref_imagem";
              if(file_exists($source)){
                  $fileContent = file_get_contents($source);
                  $section->addImage($fileContent, array('alignment' => Jc::CENTER, 'width' => 450));
                  $section->addTextBreak(2);
              } else {
                  $section->addText("Ocorreu um erro com a imagem.", ['color' => "FF0000", 'size' => 14]);
              }
            }
        }
        return array('i' => $i, 'section' => $section);
	}

}
