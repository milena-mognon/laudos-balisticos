<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Componente;
use Illuminate\Database\Eloquent\Model;


class ComponentesText
{
    private $section, $i, $config;

    public function __construct($section, $config, $i)
    {
        $this->section = $section;
        $this->config = $config;
        $this->i = $i;
    }

    public function addText($componentes)
    {
        foreach ($componentes as $componente) {
            $this->i++;
            $laudo = Componente::componente($componente);

            $textrun = $this->section->addTextRun($this->config->paragraphJustify());
            $text = [$textrun->addText($this->i . "- " . $laudo["inicio"], $this->config->arial12Bold()),
                $textrun->addText($laudo["corpo"], $this->config->arial12())];
            $this->section->addTextBreak(1);
        }
        if (collect($componentes->toArray())->last()) {
            $this->section->addText("Seguindo o Procedimento Operacional Padrão – Perícia Criminal, da Secretaria Nacional de Segurança Pública, no que tange à Balística Forense, observamos que: Nenhum estojo decorrente do teste de eficiência de munição para arma de fogo deverá retornar para a autoridade requisitante da perícia. Todo o material remanescente deverá ser destruído/descartado ou catalogado e arquivado, quando for o caso.", $this->config->arial12Underline(), $this->config->paragraphJustify());
            $this->section->addTextBreak(1);
        }
        return array('i' => $this->i, 'section' => $this->section);
    }
}
