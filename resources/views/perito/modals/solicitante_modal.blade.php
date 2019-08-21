@extends('layout.modal')
@section('modal-id', 'solicitante_modal')
@section('modal-title', 'Cadastrar Órgão Solicitante')
@section('modal-content')
    <p>Atenção! Antes de cadastrar, certifique-se que a escrita está certa.</p>
    <div class="col-lg-12 mt-2">
        <label>Órgão Solicitante: *</label>
        <input class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
               type="text" id="nome_solicitante" name="nome"
               autocomplete="off"/>
        @include('shared.error_feedback', ['name' => 'nome'])
    </div>
    <div class="col-lg-12 mt-2">
        <label for="cidade_id2">Cidade</label>
        <select class="js-single-cidades form-control {{ $errors->has('cidade_id2') ? ' is-invalid' : '' }}"
                name="cidade_id2" id="cidade2" style="width: 100%">
            <option></option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}">
                    {{$cidade->nome}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'cidade_id2'])
    </div>

    <p>* Obrigatório</p>
    <button type="button" class="btn btn-primary" id="cadastro_solicitante">Cadastrar</button>
@endsection