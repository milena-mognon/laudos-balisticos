@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastrar Marca</h4>
    </div>
    <hr>
    <div class="col-lg-10">
        @include('admin.marcas.form', ['acao' => 'Cadastrar'])
    </div>
@endsection
