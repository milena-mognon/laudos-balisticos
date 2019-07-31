<?php

namespace App\Http\Controllers\Perito;

use App\Http\Requests\ArmaRequest;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;
use App\Models\Arma;
use App\Http\Controllers\Controller;

class ArmasController extends Controller
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
    public function create($laudo_id)
    {
        $marcas = Marca::categoria('Arma')->get();
        $origens = Origem::all();
        $calibres = Calibre::arma('revolver')->get();
        return view('perito.revolver.create',
            compact('laudo_id', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArmaRequest $request)
    {
        Arma::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo_id, Arma $arma)
    {
        $marcas = Marca::categoria('Arma')->get();
        $origens = Origem::all();
        $calibres = Calibre::arma('revolver')->get();
        return view('perito.revolver.edit',
            compact('arma', 'laudo_id', 'marcas', 'origens', 'calibres'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(ArmaRequest $request, $laudo_id, Arma $arma)
    {
        $updated_arma = $request->all();
        Arma::find($arma->id)->fill($updated_arma)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arma $arma)
    {
        //
    }
}
