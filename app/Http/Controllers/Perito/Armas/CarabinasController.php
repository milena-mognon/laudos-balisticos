<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Perito\Armas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Armas\CarabinaRequest;
use App\Models\Arma;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;

class CarabinasController extends Controller
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
        $calibres = Calibre::arma('carabina');
        return view('perito.laudo.materiais.armas.carabina.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarabinaRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')])
            ->with('success', __('flash.create_f', ['model' => 'Carabina']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arma $carabina
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $carabina)
    {
//        $marcas = Marca::marcasWithTrashed('armas', $carabina->marca);
//        $origens = Origem::origensWithTrashed($carabina->origem);
//        $calibres = Calibre::calibresWithTrashed('revólver', $carabina->calibre);
        return view('perito.laudo.materiais.armas.carabina.show',
            compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo $laudo
     * @param  \App\Models\Arma $carabina
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Arma $carabina)
    {
        $marcas = Marca::marcasWithTrashed('armas', $carabina->marca);
        $origens = Origem::origensWithTrashed($carabina->origem);
        $calibres = Calibre::calibresWithTrashed('carabina', $carabina->calibre);
        $imagens = $carabina->imagens;
        return view('perito.laudo.materiais.armas.carabina.edit',
            compact('carabina', 'laudo', 'marcas', 'origens', 'calibres', 'imagens'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $carabina
     * @return \Illuminate\Http\Response
     */
    public function update(CarabinaRequest $request, $laudo_id, Arma $carabina)
    {
        $updated_arma = $request->all();
        Arma::find($carabina->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id])
            ->with('success', __('flash.update_f', ['model' => 'Carabina']));
    }
}
