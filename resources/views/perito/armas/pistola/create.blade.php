@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastro de Pistola</h4>
    </div>
    <hr>
    @include('perito.armas.pistola.form', ['acao' => 'Cadastrar'])
@endsection