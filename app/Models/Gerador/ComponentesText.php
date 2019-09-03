<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Componente;
use Illuminate\Database\Eloquent\Model;


class ComponentesText extends Model
{
    private static $i;

    public static function addText($componentes, $section, $phpWord, $config, $i)
    {

        foreach ($componentes as $componente) {
            $i++;
            $laudo = Componente::componente($componente);

            $textrun = $section->addTextRun($config->paragraphJustify());
            $text = [$textrun->addText($i . "- " . $laudo["inicio"], $config->arial12Bold()),
                $textrun->addText($laudo["corpo"], $config->arial12())];
            $section->addTextBreak(1);
        }
        if (collect($componentes->toArray())->last()) {
            $section->addText("Seguindo o Procedimento Operacional Padrão – Perícia Criminal, da Secretaria Nacional de Segurança Pública, no que tange à Balística Forense, observamos que: Nenhum estojo decorrente do teste de eficiência de munição para arma de fogo deverá retornar para a autoridade requisitante da perícia. Todo o material remanescente deverá ser destruído/descartado ou catalogado e arquivado, quando for o caso.", $config->arial12Underline(), $config->paragraphJustify());
            $section->addTextBreak(1);
        }
        return array('i' => $i, 'section' => $section);
    }

}
