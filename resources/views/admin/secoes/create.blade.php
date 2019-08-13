@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastrar Seção</h4>
    </div>
    <hr>
    <div class="col-lg-10 m-auto">
        @include('admin.secoes.form', ['acao' => 'Cadastrar'])
    </div>
@endsection
