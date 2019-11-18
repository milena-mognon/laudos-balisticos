<?php

namespace App\Http\Controllers\Perito\Componentes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComponenteRequest;
use App\Models\Componente;

class ComponentesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponenteRequest $request, $laudo)
    {
        Componente::create($request->all());
        return redirect()->route('laudos.show', ['id' => $laudo->id])
            ->with('success', __('flash.create_m', ['model' => 'Componente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $laudo
     * @param  Componente $componente
     * @return \Illuminate\Http\Response
     */
    public function edit($laudo, Componente $componente)
    {

        switch ($componente->componente) {
            case 'Balins de Chumbo':
                return redirect()->route('balins_chumbo.edit', [$laudo, $componente]);
                break;
            case 'Pólvora':
                return redirect()->route('polvora.edit', [$laudo, $componente]);
                break;
            case 'Espoletas':
                return redirect()->route('espoletas.edit', [$laudo, $componente]);
                break;
            default:
                return redirect()->route('laudos.show', compact('laudo'))
                    ->with('error', 'Não é possível editar este componente!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComponenteRequest $request, $laudo, $componente)
    {
        $updated_componente = $request->all();
        Componente::find($componente->id)->fill($updated_componente)->save();
        return redirect()->route('laudos.show', ['id' => $laudo->id])
            ->with('success', __('flash.update_m', ['model' => 'Componente']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $laudo
     * @param $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy($laudo, $componente)
    {
        Componente::destroy($componente->id);
        return response()->json(['success' => 'done']);
    }
}
