<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SecaoRequest;
use App\Models\Secao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secoes = Secao::orderBy('nome')->get();
        return view('admin/secoes/index',
            compact('secoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/secoes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecaoRequest $request)
    {
        Secao::create($request->all());

        return redirect()->route('secoes.index')
            ->with('success', 'Seção cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secao  $secao
     * @return \Illuminate\Http\Response
     */
    public function show(Secao $secao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secao  $secao
     * @return \Illuminate\Http\Response
     */
    public function edit(Secao $secao)
    {
        return view('admin/secoes/edit',
            compact('secao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secao  $secao
     * @return \Illuminate\Http\Response
     */
    public function update(SecaoRequest $request, Secao $secao)
    {
        $secao_updates = $request->all();
        Secao::find($secao->id)->fill($secao_updates)->save();

        return redirect()->route('secoes.index')
            ->with('success', 'Seção atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Secao::destroy($id);
        return response()->json(['success'=>'done']);
    }
}
