<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrgaoSolicitanteRequest;
use App\Models\Cidade;
use App\Models\OrgaoSolicitante;
use App\Http\Controllers\Controller;

class OrgaosSolicitantesController extends Controller
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
        $solicitantes = OrgaoSolicitante::all();
        return view('admin/orgaos-solicitantes/index',
            compact('solicitantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        return view('admin.orgaos-solicitantes.create',
            compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrgaoSolicitanteRequest $request)
    {
        OrgaoSolicitante::create($request->all());

        return redirect()->route('solicitantes.index')
            ->with('success', 'Órgão Solicitante cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrgaoSolicitante $solicitante)
    {
        $cidades = Cidade::all();
        return view('admin.orgaos-solicitantes.edit',
            compact('solicitante', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrgaoSolicitanteRequest $request, OrgaoSolicitante $solicitante)
    {
        $solicitante_updates = $request->all();
        OrgaoSolicitante::find($solicitante->id)->fill($solicitante_updates)->save();

        return redirect()->route('solicitantes.index')
            ->with('success', 'Órgão solicitante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $solicitante
     * @return \Illuminate\Http\Response
     */
    public function destroy($solicitante)
    {
        OrgaoSolicitante::destroy($solicitante);
        return response()->json(['success'=>'done']);
    }

    public function filtrar_por_cidade($cidade_id){
        $solicitantes = Cidade::find($cidade_id)->solicitantes;
        return response()->json(['data' => $solicitantes]);
    }
}
