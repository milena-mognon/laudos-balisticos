<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Style\Language;

class Gerar
{
    private $phpWord;
    private $section;
    private $conf;
    private $phpW;
    private $geral;

    public function __construct()
    {
        $this->phpWord = new PhpWord();
        $this->conf = new Config($this->phpWord);
        $this->section = $this->conf->getSection();
        $this->phpW = $this->phpWord;
    }

    public function create_docx($laudo)
    {
        $i = 0;
        $this->phpW->getSettings()->setThemeFontLang(new Language(Language::PT_BR));
        Settings::setOutputEscapingEnabled(true);

        $this->geral = new Geral($this->section, $this->conf, $this->phpW);
        $this->geral->addText($laudo);

        $armasText = new ArmasText($this->section, $this->conf, $i);
        $armasText = $armasText->addText($laudo->armas);
        $i = $armasText['i'];

        $municoesText = new MunicoesText($this->section, $this->conf, $i);
        $municoesText = $municoesText->addText($laudo->municoes);
        $i = $municoesText['i'];

        $componentesText = new ComponentesText($this->section, $this->conf, $i);
        $componentesText = $componentesText->addText($laudo->componentes);
        $i = $componentesText['i'];

        $this->geral->addFinalText($laudo->perito->nome);

        $this->section->addFooter();

        $objWriter = IOFactory::createWriter($this->phpW, 'Word2007');

        $nome_arquivo = 'Laudo ' . str_replace("/", "-", $laudo->rep) . '.docx';

        if (!is_dir(storage_path('/laudos'))) {
            mkdir(storage_path('/laudos'), 0755, true);
        };

        try {
            $objWriter->save(storage_path('laudos/' . $nome_arquivo));
        } catch (Exception $e) {
            echo "erro";
        }
        return response()->download(storage_path('laudos/' . $nome_arquivo));

    }
}
