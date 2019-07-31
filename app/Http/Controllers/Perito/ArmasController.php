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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($laudo_id)
    {
        $laudo_id = $laudo_id->id;
        $marcas = Marca::where('categoria', 'Arma')->get();
        $origens = Origem::orderBy('nome')->get();
        $calibres = Calibre::where('tipo_arma', 'revolver')->get();
        return view('perito.revolver.create2',
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
     * Display the specified resource.
     *
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function show(Arma $arma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function edit(Arma $arma)
    {
        $marcas = Marca::where('categoria', 'Arma')->get();
        $origens = Origem::orderBy('nome')->get();
        $calibres = Calibre::where('tipo_arma', 'revolver')->get();
        $laudo_id = $arma->laudo_id;
        return view('perito/revolver/edit',
            compact('arma', 'laudo_id', 'marcas', 'origens', 'calibres'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Arma $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(ArmaRequest $request, Arma $arma)
    {
        //
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
