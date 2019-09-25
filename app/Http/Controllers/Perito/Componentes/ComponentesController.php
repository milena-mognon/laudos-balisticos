<?php

namespace App\Http\Controllers\Perito\Componentes;

use App\Http\Requests\ComponenteRequest;
use App\Http\Controllers\Controller;
use App\Models\Componente;

class ComponentesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponenteRequest $request, $laudo)
    {
        Componente::create($request->all());
        return redirect()->route('laudos.show', ['id' => $laudo->id])
            ->with('success', __('flash.update_f', ['model' => 'Componente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComponenteRequest $request, $laudo, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($laudo, $id)
    {
        //
    }
}
