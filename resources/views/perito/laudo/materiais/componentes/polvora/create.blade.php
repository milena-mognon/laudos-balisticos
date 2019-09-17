@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastro de Pólvora</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.componentes.polvora.form', ['acao' => 'Cadastrar'])
@endsection