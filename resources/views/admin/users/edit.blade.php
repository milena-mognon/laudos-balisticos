@extends('layout.component')
@section('page')

    <div class="col-8">
        <h4>Editar Usuário</h4>
    </div>
    <hr>
    <div class="col-lg-10 m-auto">
        @include('admin.users.form', ['acao' => 'Atualizar'])
    </div>
@endsection
