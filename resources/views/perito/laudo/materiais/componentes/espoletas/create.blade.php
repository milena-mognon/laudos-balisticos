@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastro de Espoletas</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.componentes.espoletas.form', ['acao' => 'Cadastrar'])
@endsection