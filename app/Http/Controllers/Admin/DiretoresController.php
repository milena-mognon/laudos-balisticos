<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DiretorRequest;
use App\Models\Diretor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiretoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diretores = Diretor::orderBy('nome')->get();
        return view('admin/diretores/index', compact('diretores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/diretores/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiretorRequest $request)
    {
        $inicio_direcao = formatar_data($request->input('inicio_direcao'));
        $fim_direcao = formatar_data($request->input('fim_direcao'));
        $dados = $request->only(['nome']);
        $datas = ['inicio_direcao' => $inicio_direcao, 'fim_direcao' => $fim_direcao];
        $diretor = array_merge($dados, $datas);

        Diretor::create($diretor);

        return redirect()->route('diretores.index')
            ->with('success', 'Diretor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diretor  $diretor
     * @return \Illuminate\Http\Response
     */
    public function show(Diretor $diretor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diretor  $diretor
     * @return \Illuminate\Http\Response
     */
    public function edit(Diretor $diretor)
    {
        $inicio_direcao = formatar_data_do_bd($diretor->inicio_direcao);
        $fim_direcao = formatar_data_do_bd($diretor->fim_direcao);
        return view('admin/diretores/edit',
            compact('diretor', 'inicio_direcao', 'fim_direcao'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diretor  $diretor
     * @return \Illuminate\Http\Response
     */
    public function update(DiretorRequest $request, Diretor $diretor)
    {
        $inicio_direcao = formatar_data($request->input('inicio_direcao'));
        $fim_direcao = formatar_data($request->input('fim_direcao'));
        $dados = $request->only(['nome']);
        $datas = ['inicio_direcao' => $inicio_direcao, 'fim_direcao' => $fim_direcao];
        $diretor_updates = array_merge($dados, $datas);
        Diretor::find($diretor->id)->fill($diretor_updates)->save();

        return redirect()->route('diretores.index')
            ->with('success', 'Diretor atualizado com sucesso!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diretor  $diretor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diretor $diretor)
    {
        //
    }
}
