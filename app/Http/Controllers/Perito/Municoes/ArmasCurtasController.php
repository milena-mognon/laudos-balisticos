<?php

namespace App\Http\Controllers\Perito\Municoes;

use App\Http\Controllers\Controller;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Municao;

class ArmasCurtasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo)
    {
        $marcas = Marca::categoria('municoes');
        $calibres = Calibre::armas('revólver', 'pistola');
        return view('perito.municoes.arma_curta.create',
            compact('laudo', 'marcas', 'calibres'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Municao $municao
     * @return \Illuminate\Http\Response
     */
    public function show(Municao $municao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Municao $municao
     * @return \Illuminate\Http\Response
     */
    public function edit(Municao $municao)
    {
        $marcas = Marca::marcasWithTrashed('municoes', $municao->marca);
        $calibres = Calibre::calibresWithTrashed('municao', $municao->calibre);
        return view('perito.municoes.arma_curta.edit',
            compact('municao', 'laudo', 'marcas', 'calibres'));
    }
}
