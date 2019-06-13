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