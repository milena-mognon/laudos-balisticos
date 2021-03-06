<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrgaoSolicitanteRequest;
use App\Models\Cidade;
use App\Models\OrgaoSolicitante;

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
        $solicitantes = OrgaoSolicitante::paginate(10);
        return view('admin/orgaos_solicitantes/index',
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
        return view('admin.orgaos_solicitantes.create',
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
            ->with('success', __('flash.create_m', ['model' => 'Órgão Solicitante']));
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
        return view('admin.orgaos_solicitantes.edit',
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
            ->with('success', __('flash.update_m', ['model' => 'Órgão Solicitante']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OrgaoSolicitante $solicitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgaoSolicitante $solicitante)
    {
        OrgaoSolicitante::destroy($solicitante->id);
        return response()->json(['success' => 'done']);
    }
}
