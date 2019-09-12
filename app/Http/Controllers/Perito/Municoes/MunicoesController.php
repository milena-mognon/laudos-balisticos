<?php

namespace App\Http\Controllers\Perito\Municoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Armas\MunicaoRequest;
use App\Models\Municao;

class MunicoesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicaoRequest $request)
    {
        Municao::create($request->all());
        return redirect()->route('laudos.show',
            ['laudo_id' => $request->input('laudo_id')])
            ->with('success', __('flash.create_f', ['model' => 'Munição']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municao $municao
     * @return \Illuminate\Http\Response
     */
    public function update(MunicaoRequest $request, $laudo_id, Municao $municao)
    {
        $updated_municao = $request->all();
        Municao::find($municao->id)->fill($updated_municao)->save();
        return redirect()->route('laudos.show', ['id' => $laudo_id])
            ->with('success', __('flash.update_f', ['model' => 'Munição']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $municao
     * @return \Illuminate\Http\Response
     */
    public function destroy($municao)
    {
        Municao::destroy($municao);
        return response()->json(['success' => 'done']);
    }
}
