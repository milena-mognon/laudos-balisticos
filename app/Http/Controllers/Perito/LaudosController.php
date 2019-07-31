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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secoes = Secao::orderBy('nome')->get();
        $cidades = Cidade::orderBy('nome')->get();
        $diretores = Diretor::orderBy('nome')->get();

        return view('perito.laudo.create',
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
        $rep = $laudo;
        $cidades = Cidade::orderBy('nome')->get();
        $secoes = Secao::orderBy('nome')->get();
        $diretores = Diretor::orderBy('nome')->get();
        $solicitantes = OrgaoSolicitante::orderBy('nome')->get();
        $armas = $laudo->armas;
//        dd($laudo->armas[0]->marca->nome);
//        $municoes = Municao::findAll($id);
//        $componentes = Componente::findAll($id);
        return view('perito.laudo.show', compact('rep', 'cidades', 'solicitantes',
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

    public function materiais($laudo_id)
    {
        return view('perito/materiais', compact('laudo_id'));
    }

    public function generate(Laudo $laudo)
    {
//        dd($laudo->armas->isEmpty());

//        $rep = $laudo;
//        $rep = Laudo::findLaudo($id); // busca o laudo e retorna os dados no formato desejado
//        $perito = User::find($rep->perito_id); // busca o nome do perito
//        $diretor = Funcionario::find("Diretor", $rep->diretor_id)->first(); // busca o nome do diretor
//        $armas = Arma::findAll($id); // encontra todas as armas referentes a um laudo
//        $municoes = Municao::findAll($id);
//        $componentes = Componente::findAll($id);
        if($laudo->armas->isEmpty()){
            dd('sff');
            return redirect()->route('laudos.show', compact('laudo'))
                ->with('warning', 'É preciso ter ao menos 1 (um) material cadastrado para gerar o laudo!');
        } else {
//            $data_extenso = Laudo::data($rep->data_designacao); // envia a data do banco (2018-10-20) e retorna por extenso
            $phpWord = new Gerar();
            $phpWord = $phpWord->create($laudo);

            return $phpWord;
        }
//
//
//        $data_extenso = Laudo::data($rep->data_designacao); // envia a data do banco (2018-10-20) e retorna por extenso
//        $phpWord = new Gerar();
//        $phpWord = $phpWord->create($id, $rep, $perito, $diretor, $data_extenso, $armas, $municoes, $componentes);
//
//        return $phpWord;
    }
}
