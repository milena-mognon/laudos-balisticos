@extends('layout.component')
@section('js')
    {!! Html::script('js/calendar.js') !!}
@endsection
@section('page')
    <div class="col-8">
        <h4>Cadastrar Diretor</h4>
    </div>
    <hr>
    <div class="col-lg-10 m-auto">
        @include('admin.diretores.form', ['acao' => 'Cadastrar'])
    </div>
@endsection
