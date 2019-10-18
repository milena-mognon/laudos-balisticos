<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Perito\Armas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Armas\PistolaRequest;
use App\Models\Arma;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;

class PistolasController extends Controller
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
        $calibres = Calibre::arma('pistola');
        return view('perito.laudo.materiais.armas.pistola.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PistolaRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')])
            ->with('success', __('flash.create_f', ['model' => 'Pistola']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arma $pistola
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $pistola)
    {
//        $marcas = Marca::marcasWithTrashed('armas', $pistola->marca);
//        $origens = Origem::origensWithTrashed($pistola->origem);
//        $calibres = Calibre::calibresWithTrashed('revólver', $pistola->calibre);
        return view('perito.laudo.materiais.armas.pistola.show',
            compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo $laudo
     * @param  \App\Models\Arma $pistola
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Arma $pistola)
    {
        $marcas = Marca::marcasWithTrashed('armas', $pistola->marca);
        $origens = Origem::origensWithTrashed($pistola->origem);
        $calibres = Calibre::calibresWithTrashed('pistola', $pistola->calibre);
        $imagens = $pistola->imagens;
        return view('perito.laudo.materiais.armas.pistola.edit',
            compact('pistola', 'laudo', 'marcas', 'origens', 'calibres', 'imagens'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $pistola
     * @return \Illuminate\Http\Response
     */
    public function update(PistolaRequest $request, $laudo_id, Arma $pistola)
    {
        $updated_arma = $request->all();
        Arma::find($pistola->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id])
            ->with('success', __('flash.update_f', ['model' => 'Pistola']));
    }
}
