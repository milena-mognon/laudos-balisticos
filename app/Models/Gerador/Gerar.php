<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Models\Gerador;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Style\Language;

class Gerar extends Model
{

    private $phpWord;
    private static $section;
    private static $conf;
    private static $phpW;

    public function __construct()
    {
        $this->phpWord = new PhpWord();
        self::$conf = new Config($this->phpWord);
        self::$section = self::$conf->getSection();
        self::$phpW = $this->phpWord;
    }

    public static function create_docx($laudo)
    {
        $i = 0;
        self::$phpW->getSettings()->setThemeFontLang(new Language(Language::PT_BR));
        Settings::setOutputEscapingEnabled(true);

        Geral::addText($laudo, self::$section, self::$phpW, self::$conf);

        $armasText = ArmasText::addText($laudo->armas, self::$section,  self::$conf, $i);
        $i = $armasText['i'];

        $municoesText = MunicoesText::addText($laudo->municoes, self::$section, self::$conf, $i);
        $i = $municoesText['i'];

//        $componentesText = ComponentesText::addText($componentes, self::$section, self::$phpW, self::$conf, $i);
        Geral::addFinalText($laudo->perito->nome, self::$section, self::$conf);

        self::$section->addFooter();

        $objWriter = IOFactory::createWriter(self::$phpW, 'Word2007');

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

//    public static function create_pdf($laudo)
//    {
//        $i = 0;
////        self::$phpW->getSettings()->setThemeFontLang(new Language(Language::PT_BR));
//        Settings::setOutputEscapingEnabled(true);
//
//        $inicio = Geral::addText($laudo, self::$section, self::$phpW, self::$conf);
//        $armasText = ArmasText::addText($laudo->armas, self::$section, self::$phpW, self::$conf, $i);
//        $i = $armasText['i']; // esta retornando apenas o valor de i
////        $municoesText = MunicoesText::addText($municoes, $id, self::$section, self::$phpW, self::$conf, $i);
////        $i = $municoesText['i'];
////        $componentesText = ComponentesText::addText($componentes, self::$section, self::$phpW, self::$conf, $i);
//        $final = Geral::addFinalText($laudo->perito->nome, self::$section, self::$conf);
//
//        $footer = self::$section->addFooter();
//
//        Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
//        Settings::setPdfRendererName('DomPDF');//'../../vendor/dompdf/dompdf'
//
//        $objWriter = IOFactory::createWriter(self::$phpW, 'PDF');
//
//        $nome_arquivo = str_replace("/", "-", $laudo->rep);
//        try {
//            $objWriter->save("Laudo $nome_arquivo.pdf");
//        } catch (Exception $e) {
//            echo "erro";
//        }
//        return response()->download("Laudo $nome_arquivo.pdf");
//    }
}
