<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use App\Models\Municoes\Cartucho;
use App\Models\Municoes\Estojo;

class MunicoesText
{
    private $section, $i, $config;

    public function __construct($section, $config, $i)
    {
        $this->section = $section;
        $this->config = $config;
        $this->i = $i;
    }

    public function addText($municoes)
    {
        $grupos_municoes = $this->grupos_municoes($municoes);
        $this->grupo_por_calibre($grupos_municoes);
        return array('i' => $this->i, 'section' => $this->section);
    }

    private function cabecalho_tabela($tipo_municao, $quantidade, $calibre, $nao_deflagrado)
    {
        $tipo = '';
        if ($tipo_municao == 'cartucho') {
            if ($nao_deflagrado) {
                $tipo = 'percutidos e não deflagrados';
            } else {
                $tipo = 'intactos';
            }
        }
        $this->i++;
        $textrun = $this->section->addTextRun($this->config->paragraphJustify());
        $textrun->addText($this->i . " - " . ucfirst(plural_tipo_municoes($tipo_municao)) . " Calibre $calibre:", $this->config->arial12Bold());
        $textrun->addText(" Trata-se de $quantidade " . plural_tipo_municoes($tipo_municao) . " $tipo conforme tabela abaixo:", $this->config->arial12());
        $table = $this->section->addTable($this->config->tabelaConfig());

        $table->addRow(500);
        $table->addCell(1550)->addText("Quantidade", $this->config->fonteTabela(), $this->config->cellCenter());
        $table->addCell(1550)->addText("Calibre", $this->config->fonteTabela(), $this->config->cellCenter());
        $table->addCell(1550)->addText("Marca", $this->config->fonteTabela(), $this->config->cellCenter());
        if ($tipo_municao != 'projétil') {
            $table->addCell(2300)->addText("Estojo/Espoleta", $this->config->fonteTabela(), $this->config->cellCenter());
        }
        if ($tipo_municao != 'estojo') {
            $table->addCell(2800)->addText("Projétil", $this->config->fonteTabela(), $this->config->cellCenter());
        }
        return $table;
    }

    private function conteudo_tabela($table, $municao)
    {
        $table->addRow(500);
        $table->addCell(1550)->addText(ucfirst($municao->quantidade), $this->config->fonteTabela(), $this->config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->calibre->nome), $this->config->fonteTabela(), $this->config->cellCenter());
        $table->addCell(1550)->addText(ucfirst($municao->marca->nome), $this->config->fonteTabela(), $this->config->cellCenter());
        if ($municao->tipo_municao != 'projétil') {
            $table->addCell(2300)->addText(ucfirst($municao->estojo), $this->config->fonteTabela(), $this->config->cellCenter());
        }
        if ($municao->tipo_municao != 'estojo') {
            $table->addCell(2800)->addText(ucfirst($municao->projetil . "/ " . $municao->tipo_projetil), $this->config->fonteTabela(), $this->config->cellCenter());
        }
    }

    private function individual($municao)
    {
        switch ($municao->tipo_municao) {
            case 'cartucho':
                $this->cartucho($municao);
                break;
            case 'estojo':
                $this->estojo($municao);
                break;
            case 'projétil':
                $this->projetil($municao);
                break;
        }
    }

    private function estojo($municao)
    {
        $this->i++;
        $laudo = Estojo::text($municao);
        $textrun = $this->section->addTextRun($this->config->paragraphJustify());
        $text = [$textrun->addText($this->i . "- " . $laudo["inicio"], $this->config->arial12Bold()),
            $textrun->addText($laudo["corpo"], $this->config->arial12()),
            $this->section->addText($laudo["resultado"], $this->config->arial12Underline(), $this->config->paragraphJustify()),
            $this->section->addTextBreak(1)];
    }

    private function cartucho($municao)
    {
        $this->i++;
        $laudo = Cartucho::text($municao);
        $textrun = $this->section->addTextRun($this->config->paragraphJustify());
        $text = [$textrun->addText($this->i . "- " . $laudo["inicio"], $this->config->arial12Bold()),
            $textrun->addText($laudo["corpo"], $this->config->arial12()),
            $this->section->addText($laudo["resultado"], $this->config->arial12Underline(), $this->config->paragraphJustify()),
            $this->section->addText($laudo["fim"], $this->config->arial12Bold(), $this->config->paragraphJustify())];
    }

    private function projetil()
    {

    }

    private function grupos_municoes($municoes)
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

    private function grupo_por_calibre($grupos_municoes)
    {
        foreach ($grupos_municoes as $grupo_calibre) {
            $this->grupo_por_tipo_municao($grupo_calibre);
        }
    }

    private function grupo_por_tipo_municao($grupos_municoes)
    {
        foreach ($grupos_municoes as $grupo_tipo_municao) {
            $this->grupo_por_funcionamento($grupo_tipo_municao);
        }
    }

    private function grupo_por_funcionamento($municoes)
    {
        foreach ($municoes as $grupo) {
            if (count($grupo) > 1) {
                $quantidade = converter_numero($grupo->sum('quantidade'));
                $tipo_municao = $grupo->pluck('tipo_municao')->first();
                $calibre = $grupo->pluck('calibre')->first()->nome;
                $nao_deflagrado = $grupo->pluck('nao_deflagrado')->first();
                $table = $this->cabecalho_tabela($tipo_municao, $quantidade, $calibre, $nao_deflagrado);
                foreach ($grupo as $municao) {
                    $this->conteudo_tabela($table, $municao);
                }
                $this->section->addTextBreak(1);
            } else {
                foreach ($grupo as $municao) {
                    $this->individual($municao);
                }
            }
        }
    }
}
