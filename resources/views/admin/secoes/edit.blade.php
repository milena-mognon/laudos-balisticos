@extends('layout.component')
@section('page')

    <div class="col-8">
        <h4>Editar Seção</h4>
    </div>
    <hr>
    <div class="col-lg-10 m-auto">
        @include('admin.secoes.form', ['acao' => 'Atualizar'])
    </div>
@endsection
