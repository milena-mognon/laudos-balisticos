<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Perito\Armas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Armas\EspingardaRequest;
use App\Models\Arma;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;

class EspingardasController extends Controller
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
        $calibres = Calibre::arma('espingarda');
        return view('perito.espingarda.create',
            compact('laudo', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspingardaRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arma $espingarda
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $espingarda)
    {
//        $marcas = Marca::marcasWithTrashed('armas', $espingarda->marca);
//        $origens = Origem::origensWithTrashed($espingarda->origem);
//        $calibres = Calibre::calibresWithTrashed('revólver', $espingarda->calibre);
        return view('perito.espingarda.show',
            compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo $laudo
     * @param  \App\Models\Arma $espingarda
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Arma $espingarda)
    {
        $marcas = Marca::marcasWithTrashed('armas', $espingarda->marca);
        $origens = Origem::origensWithTrashed($espingarda->origem);
        $calibres = Calibre::calibresWithTrashed('espingarda', $espingarda->calibre);
        return view('perito.espingarda.edit',
            compact('espingarda', 'laudo', 'marcas', 'origens', 'calibres'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(EspingardaRequest $request, $laudo_id, Arma $espingarda)
    {
        $updated_arma = $request->all();
        Arma::find($espingarda->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id]);
    }
}