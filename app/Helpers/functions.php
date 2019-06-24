<?php

function formatar_data($data)
{
    $ano= substr($data, 6, 4); // 28/12/2018
    $mes= substr($data, 3, 2);
    $dia= substr($data, 0, 2);
    return $ano."-".$mes."-".$dia;
}

function formatar_data_do_bd($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}

function formatar_data_por_extenso(){
    setlocale(LC_TIME, 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    $date = date('Y-m-d');
    echo strftime("%A, %d de %B de %Y", strtotime($date));
}