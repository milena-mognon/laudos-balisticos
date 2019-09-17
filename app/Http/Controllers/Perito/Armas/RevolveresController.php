<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Perito\Armas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Armas\RevolverRequest;
use App\Models\Arma;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;

class RevolveresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo)
    {
        $marcas = Marca::categoria('armas');
        $origens = Origem::all();
        $calibres = Calibre::arma('revólver');
        return view('perito.laudo.materiais.armas.revolver.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevolverRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')])
            ->with('success', __('flash.create_m', ['model' => 'Revólver']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $revolver)
    {
//        $marcas = Marca::marcasWithTrashed('armas', $revolver->marca);
//        $origens = Origem::origensWithTrashed($revolver->origem);
//        $calibres = Calibre::calibresWithTrashed('revólver', $revolver->calibre);
        return view('perito.laudo.materiais.armas.revolver.show',
            compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo $laudo
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Arma $revolver)
    {
        $marcas = Marca::marcasWithTrashed('armas', $revolver->marca);
        $origens = Origem::origensWithTrashed($revolver->origem);
        $calibres = Calibre::calibresWithTrashed('revólver', $revolver->calibre);
        return view('perito.laudo.materiais.armas.revolver.edit',
            compact('revolver', 'laudo', 'marcas', 'origens', 'calibres'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(RevolverRequest $request, $laudo_id, Arma $revolver)
    {
        $updated_arma = $request->all();
        Arma::find($revolver->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id])
            ->with('success', __('flash.update_m', ['model' => 'Revólver']));
    }
}
