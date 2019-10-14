@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastro de Carabina</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.armas.carabina.form', ['acao' => 'Cadastrar'])
@endsection