<?php

namespace App\Http\Controllers\Perito;

use App\Http\Requests\LaudoRequest;
use App\Models\Cidade;
use App\Models\Diretor;
use App\Models\Laudo;
use App\Models\OrgaoSolicitante;
use App\Models\Secao;
use App\Models\Gerador\Gerar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaudosController extends Controller
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
        $user = Auth::id();
        $laudos = Laudo::findMyReps($user);
        return view('perito.laudo.index', compact('laudos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secoes = Secao::all();
        $cidades = Cidade::all();
        $diretores = Diretor::all();

        return view('perito.laudo.create2',
            compact('secoes', 'cidades', 'diretores'));
    }
     /*
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaudoRequest $request)
    {
        $data_designacao = formatar_data($request->input('data_designacao'));
        $data_solicitacao = formatar_data($request->input('data_solicitacao'));
        $laudo = $request->except(['data_designacao', 'data_solicitacao']);
        $laudo_info = array_merge($laudo, ['data_solicitacao' => $data_solicitacao, 'data_designacao' => $data_designacao]);
        $saved_laudo = Laudo::create($laudo_info);
        $laudo_id = $saved_laudo->id;
        return redirect()->route('laudos.materiais', compact('laudo_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function show(Laudo $laudo)
    {
        $cidades = Cidade::all();
        $secoes = Secao::all();
        $diretores = Diretor::all();
        $solicitantes = OrgaoSolicitante::all();
        $armas = $laudo->armas;
//        $municoes = Municao::findAll($id);
//        $componentes = Componente::findAll($id);
        return view('perito.laudo.show',
            compact('laudo', 'cidades', 'solicitantes',
            'diretores', 'secoes', 'armas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Laudo $laudo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laudo  $laudo
     * @return \Illuminate\Http\Response
     */
    public function update(LaudoRequest $request, Laudo $laudo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $laudo
     * @return \Illuminate\Http\Response
     */
    public function destroy($laudo)
    {
        //
    }

    public function materiais($laudo)
    {
        return view('perito.materiais', compact('laudo'));
    }

    public function generate_docx(Laudo $laudo)
    {
        if($laudo->armas->isEmpty()){
            return redirect()->route('laudos.show', compact('laudo'))
                ->with('warning', 'É preciso ter ao menos 1 (um) material cadastrado para gerar o laudo!');
        } else {
            $phpWord = new Gerar();
            $phpWord = $phpWord->create_docx($laudo);

            return $phpWord;
        }
    }

//    public function generate_pdf(Laudo $laudo)
//    {
//        if($laudo->armas->isEmpty()){
//            return redirect()->route('laudos.show', compact('laudo'))
//                ->with('warning', 'É preciso ter ao menos 1 (um) material cadastrado para gerar o laudo!');
//        } else {
//            $phpWord = new Gerar();
//            $phpWord = $phpWord->create_pdf($laudo);
//
//            return $phpWord;
//        }
//    }
}
