<?php

namespace App\Http\Controllers\Perito;

use App\Http\Requests\RevolverRequest;
use App\Models\Calibre;
use App\Models\Marca;
use App\Models\Origem;
use App\Models\Revolver;
use App\Http\Controllers\Controller;

class RevolveresController extends Controller
{
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
        $marcas = Marca::where('categoria', 'Armas')->get();
        $origens = Origem::orderBy('nome')->get();
        $calibres = Calibre::where('tipo_arma', 'revolver')->get();
//        dd($marcas);
        return view('perito.revolver.create',
            compact('laudo_id', 'marcas', 'origens', 'calibres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevolverRequest $request)
    {
        Revolver::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revolver  $revolver
     * @return \Illuminate\Http\Response
     */
    public function show(Revolver $revolver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revolver  $revolver
     * @return \Illuminate\Http\Response
     */
    public function edit(Revolver $revolver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revolver  $revolver
     * @return \Illuminate\Http\Response
     */
    public function update(RevolverRequest $request, Revolver $revolver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revolver  $revolver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revolver $revolver)
    {
        //
    }
}
