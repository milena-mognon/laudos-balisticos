<?php

namespace App\Http\Controllers\Perito\Componentes;

use App\Http\Controllers\Controller;

class EspoletasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo)
    {
        return view('perito.laudo.materiais.componentes.espoletas.create',
            compact('laudo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
}
