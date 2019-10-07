<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use App\Models\User;
use App\Models\Secao;
use App\Models\Laudo;
use App\http\Requests\RelatorioRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function index()
    {
        $peritos = User::all();
        $secoes = Secao::all();
        return view('admin.relatorios.index', compact('peritos', 'secoes'));
    }

    public function relatorio_completo()
    {
        $total = Laudo::total_laudos_gerados();
        $total_por_perito = Laudo::total_laudos_por_perito();
        $total_por_secao = Laudo::total_laudos_por_secao();
        $total_por_anos = Laudo::total_laudos_por_ano();
        $pdf = PDF::loadView('admin.relatorios.relatorio_completo',
            ['total' => $total,
                'total_por_perito' => $total_por_perito,
                'total_por_secao' => $total_por_secao,
                'total_por_anos' => $total_por_anos]);
        return $pdf->download('relatorio_completo.pdf');
    }

    public function create_custom_report(RelatorioRequest $request)
    {
        $filtros = $request->all();
        $laudos = Laudo::customReport($filtros);
        $pdf = PDF::loadView('admin.relatorios.relatorio_personalizado',
            ['laudos' => $laudos,
                'data_inicial' => $request->input('data_inicial'),
                'data_final' => $request->input('data_final'),
                'peritos' => $request->input('peritos_ids')]);
        return $pdf->download('relatorio_personalizado.pdf');
    }
}
