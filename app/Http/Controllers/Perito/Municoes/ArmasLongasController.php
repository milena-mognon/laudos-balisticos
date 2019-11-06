<?php

namespace App\Http\Controllers\Perito\Municoes;

use App\Http\Controllers\Controller;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Municao;

class ArmasLongasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo)
    {
        $marcas = Marca::categoria('municoes');
        $calibres = Calibre::whereArma('espingarda');
        return view('perito.laudo.materiais.municoes.arma_longa.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
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
    public function edit($laudo, Municao $municao)
    {
        $marcas = Marca::marcasWithTrashed('municoes', $municao->marca);
        $calibres = Calibre::calibresWithTrashed('espingarda', $municao->calibre);
        return view('perito.laudo.materiais.municoes.arma_longa.edit',
            compact('municao', 'laudo', 'marcas', 'calibres'));
    }
}
