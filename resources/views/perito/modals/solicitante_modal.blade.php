@extends('layout.modal')
@section('modal-id', 'solicitante_modal')
@section('modal-title', 'Cadastrar órgão Solicitante')
@section('modal-content')
    <p>Atenção! Antes de cadastrar, certifique-se que a escrita está certa.</p>
    <div class="form-group">
        <label>Órgão Solicitante: *</label>
        <input class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
               type="text" id="nome_solicitante" name="nome"
               autocomplete="off"/>
        @include('shared.error_feedback', ['name' => 'nome'])

        <label>Cidade: * </label>
        <select class="form-control {{ $errors->has('cidade_id') ? ' is-invalid' : '' }}"
                name="cidade_id2" id="cidade2">
            @foreach($cidades as $cidade)
                <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'cidade_id'])


        <p>* Obrigatório</p>
        <button type="button" class="btn btn-primary" id="cadastro_solicitante">Cadastrar</button>
    </div>
@endsection