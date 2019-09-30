<?php

namespace App\Http\Controllers\Perito;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function index()
    {
        return view('perito.relatorios.index');
    }

    public function create_report()
    {
        $data = 'teste';
        $pdf = PDF::loadView('relatorios.teste', ['data' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
