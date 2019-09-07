<?php

/* formata a data para o padrão do Banco de Dados*/
function formatar_data($data)
{
    $ano = substr($data, 6, 4); // 28/12/2018
    $mes = substr($data, 3, 2);
    $dia = substr($data, 0, 2);
    return $ano . "-" . $mes . "-" . $dia; // 2018-12-28
}

/* formata a data para o padrão dia/mes/anos */
function formatar_data_do_bd($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}

/* Converte os números para extenso. (Usado no texto do laudo)*/
function converter_numero(INT $numero)
{
    $unidade = [
        '0' => 'zero', '1' => 'um', '2' => 'dois', '3' => 'três', '4' => 'quatro',
        '5' => 'cinco', '6' => 'seis', '7' => 'sete', '8' => 'oito', '9' => 'nove',
        '10' => 'dez', '11' => 'onze', '12' => 'doze', '13' => 'treze', '14' => 'quatorze',
        '15' => 'quinze', '16' => 'dezesseis', '17' => 'dezessete', '18' => 'dezoito',
        '19' => 'dezenove'
    ];

    $dezena = [
        '20' => 'vinte', '30' => 'trinta', '40' => 'quarenta', '50' => 'cinquenta',
        '60' => 'sessenta', '70' => 'setenta', '80' => 'oitenta', '90' => 'noventa'
    ];


    $num_extenso = "";
    $num_size = strlen($numero);

    if ($num_size == 1) {
        $num_extenso = $unidade[$numero];
        return $num_extenso;
    }
    $dividir = str_split($numero, $num_size - 1);
    if ($num_size == 2 && $dividir['0'] <> 1) {
        $num_extenso = $dezena[$dividir['0'] . "0"];
        if ($dividir['1'] <> 0) {
            $num_extenso = $num_extenso . " e " . $unidade[$dividir['1'] . ""];
        }
    } else {
        if ($num_size == 2 && $dividir['0'] == 1) {
            $num_extenso = $unidade[$dividir['0'] . "" . $dividir['1'] . ""];
        }

    }
    return $num_extenso;
}

function converter_numero_raias(INT $numero)
{
    switch ($numero) {
        case 1:
            return 'uma';
            break;
        case 2:
            return 'duas';
            break;
        default:
            return converter_numero($numero);
    }

}

/* Converte a data para escrita em extenso */
function data_extenso($dia, $mes, $ano)
{
    $dias = ["zero", "primeiro", "dois", "três", "quatro", "cinco", "seis", "sete", "oito",
        "nove", "dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete",
        "dezoito", "dezenove", "vinte", "vinte e um", "vinte e dois", "vinte e três",
        "vinte e quatro", "vinte e cinco", "vinte e seis", "vinte e sete", "vinte e oito",
        "vinte e nove", "trinta", "trinta e um"];

    $meses = ["*", "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho",
        "agosto", "setembro", "outubro", "novembro", "dezembro"];

    $anos = ["2013" => "dois mil e treze", "2014" => "dois mil e quatorze",
        "2015" => "dois mil e quinze", "2016" => "dois mil e dezesseis",
        "2017" => "dois mil e dezessete", "2018" => "dois mil e dezoito",
        "2019" => "dois mil e dezenove", "2020" => "dois mil e vinte",
        "2021" => "dois mil e vinte e um", "2022" => "dois mil e vinte e dois",
        "2023" => "dois mil e vinte e três", "2024" => "dois mil e vinte e quatro",
        "2025" => "dois mil e vinte e cinco", "2026" => "dois mil e vinte e seis"];

    if ($dia == 1) {
        $day = "Ao $dias[$dia] dia";
    } else {
        $day = "Aos $dias[$dia] dias";
    }
    $data_extenso = "$day do mês de $meses[$mes] do ano de $anos[$ano]";
    return $data_extenso;
}

/* Desmembra a data e retorna o escrita em extenso */
function data($data)
{
    $dia = substr("$data", 8, 2); // retorna o dia -> 2018-01-02
    if (substr("$dia", 0, 1) == 0) {
        $dia = substr("$data", 9, 1); // retorna dia sem o 0 na frente = 01 -> 1
    }
    $mes = substr("$data", 5, 2); // retorna só o mês -> 2017-10 = 10
    if (substr("$mes", 0, 1) == 0) {
        $mes = substr("$data", 6, 1); // retorna mês sem o 0 na frente = 01 -> 1
    }
    $ano = substr("$data", 0, 4); // retorna o ano

    $data_extenso = data_extenso($dia, $mes, $ano);

    return $data_extenso;
}

function armas_route_name($material)
{
    switch ($material) {
        case 'Revólver':
            return 'revolveres';
            break;
        case 'Espingarda':
            return 'espingardas';
            break;
        case 'Garrucha':
            return 'garruchas';
            break;
        case 'Pistola':
            return 'pistolas';
            break;
        default:
            return 'armas';
    }
}