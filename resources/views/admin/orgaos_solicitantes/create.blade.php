@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastrar Órgão Solicitante</h4>
    </div>
    <hr>
    {!! Form::open(['route' => 'solicitantes.store']) !!}
    <div class="col-lg-10 m-auto">
        @include('admin.orgaos_solicitantes.form', ['acao' => 'Cadastrar'])
    </div>
@endsection
