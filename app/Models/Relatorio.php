<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Relatorio
{
    public static function todos_laudos_gerados()
    {
        $total = Laudo::all()->count();
        return $total;
    }

    public static function total_laudos_por_perito()
    {
        $group_laudos_peritos = Laudo::all()->groupBy('perito_id');
        $laudos_peritos = [];
        foreach ($group_laudos_peritos as $laudos_perito)
            array_push($laudos_peritos, ['nome' => $laudos_perito->first()->perito->nome,
                'quantidade' => $laudos_perito->count()]);
        return $laudos_peritos;
    }

    public static function total_laudos_por_secao()
    {
        $group_laudos_secoes = Laudo::all()->groupBy('secao_id');
        $laudos_secoes = [];
        foreach ($group_laudos_secoes as $laudos_secao)
            array_push($laudos_secoes, ['nome' => $laudos_secao->first()->secao->nome,
                'quantidade' => $laudos_secao->count()]);
        return $laudos_secoes;
    }

    public static function total_laudos_por_ano()
    {
        $group_laudos_anos = DB::table('laudos')
            ->select(
                DB::raw('count(created_at) as quantidade'),
                DB::raw('YEAR(created_at) as ano'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();
        $laudos_anos = [];
        foreach ($group_laudos_anos as $laudos_ano)
            array_push($laudos_anos, ['ano' => $laudos_ano->ano,
                'quantidade' => $laudos_ano->quantidade]);
            return $laudos_anos;
    }
}
