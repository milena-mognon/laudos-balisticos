@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Espingarda</h4>
    </div>
    <hr>
    @include('perito.espingarda.form', ['acao' => 'Atualizar'])
@endsection
