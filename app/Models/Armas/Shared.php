<?php

namespace App\Models\Armas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Util;

class Shared extends Model
{

    public static function acabamento($acabamento)
    {
        if ($acabamento == "desprovido") {
            return "Desprovido de acabamento";
        } else {
            return "Possui acabamento $acabamento";
        }
    }

    public static function serie($tipo_serie, $num_serie)
    {
        switch ($tipo_serie) {
            case 'legível':
                return "com número de série " . "\"" . $num_serie . "\"";
                break;
            case 'revelado':
                return "com número de série revelado " . "\"" . $num_serie . "\"";
                break;
            case 'regravado':
                return "com número de série regravado " . "\"" . $num_serie . "\"";
                break;
            case 'ilegível':
                return "com número de série ilegível";
                break;
            case 'suprimido intencionalmente':
                return "com número de série suprimido intencionalmente";
                break;
            case 'não aparente':
                return "sem número de série aparente";
                break;
            case 'adulterado':
                return "com número de série adulterado";
                break;
            default:
                return "";
        }
    }

    public static function marca($marca)
    {
        if ($marca == "Não Aparente") {
            return "não aparente";
        } else {
            return "\"" . $marca . "\"";
        }
    }

    public static function funcionamento($funcionamento)
    {
        if ($funcionamento == 'eficiente') {
            return "Submetida esta arma de fogo a prova de disparo foi observado o funcionamento normal dos seus mecanismos, estando a mesma $funcionamento para a realização de tiros.";
        }
        if ($funcionamento == 'ineficiente') {
            return "Submetida esta arma de fogo a prova de disparo foi observado o funcionamento anormal dos seus mecanismos, estando a mesma $funcionamento para a realização de tiros, podendo ainda ser utilizada como instrumento contundente e/ou de intimidação.";
        }
    }

    public static function sistemaFuncionamento($sistema_funcionamento, $tipo_carregador = "")
    {
        if ($sistema_funcionamento == "unitário") {
            return "de tiro unitário";
        } else {
            return $sistema_funcionamento . " e carregador $tipo_carregador";
        }
    }

    public static function chaveAbertura($chave_abertura)
    {
        if ($chave_abertura == "guarda-mato") {
            return "no guarda-mato";
        } else {
            return "na $chave_abertura";
        }
    }

    public static function teclasGatilho($teclas_gatilho)
    {
        if ($teclas_gatilho == "duas") {
            return "duas teclas de gatilho";
        } else {
            return "uma tecla de gatilho";
        }
    }

}
