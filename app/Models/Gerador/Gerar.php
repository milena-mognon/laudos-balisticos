<?php

namespace App\Models\Gerador;

use App\Models\Gerador\Config;
use App\Models\Gerador\Geral;
use App\Models\Gerador\ArmasText;
use App\Models\Gerador\MunicoesText;
use App\Models\Gerador\ComponentesText;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Style\Language;
use PhpOffice\PhpWord\PhpWord;

class Gerar extends Model
{

    private $phpWord;
    private static $config;
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

    public static function create($laudo)
    {
        $i = 0;
//        self::$phpW->getSettings()->setThemeFontLang(new Language(Language::PT_BR));
        Settings::setOutputEscapingEnabled(true);

        $inicio = Geral::addText($laudo, self::$section, self::$phpW, self::$conf);
        $armasText = ArmasText::addText($laudo->armas, self::$section, self::$phpW, self::$conf, $i);
        $i = $armasText['i']; // esta retornando apenas o valor de i
//        $municoesText = MunicoesText::addText($municoes, $id, self::$section, self::$phpW, self::$conf, $i);
//        $i = $municoesText['i'];
//        $componentesText = ComponentesText::addText($componentes, self::$section, self::$phpW, self::$conf, $i);
        $final = Geral::addFinalText($laudo->perito->nome, self::$section, self::$conf);

        $footer = self::$section->addFooter();

        $objWriter = IOFactory::createWriter(self::$phpW, 'Word2007');
//        $objWriter2 = IOFactory::createWriter(self::$phpW, 'PDF');

        $nome_arquivo =  str_replace("/","-",$laudo->rep);
        try {
           $objWriter->save("Laudo $nome_arquivo.docx");
//            $objWriter2->save("Laudo $nome_arquivo.pdf");
        } catch (Exception $e) {
            echo "erro";
        }
        return response()->download("Laudo $nome_arquivo.docx");
//        return response()->download("Laudo $nome_arquivo.pdf");

    }
}
