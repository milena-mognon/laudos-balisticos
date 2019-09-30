<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use Barryvdh\DomPDF\Facade as PDF;

class RelatoriosController extends Controller
{

    public function index()
    {
        return view('admin.relatorios.index');
    }

    public function relatorio_completo()
    {
        $total = Relatorio::todos_laudos_gerados();
        $total_por_perito = Relatorio::total_laudos_por_perito();
        $total_por_secao = Relatorio::total_laudos_por_secao();
        $total_por_anos = Relatorio::total_laudos_por_ano();
        $pdf = PDF::loadView('admin.relatorios.relatorio_completo',
            ['total' => $total,
                'total_por_perito' => $total_por_perito,
                'total_por_secao' => $total_por_secao,
                'total_por_anos' => $total_por_anos]);
        return $pdf->download('invoice.pdf');
    }
}
