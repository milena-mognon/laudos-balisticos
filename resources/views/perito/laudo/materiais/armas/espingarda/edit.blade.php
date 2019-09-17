@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Espingarda</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.armas.espingarda.form', ['acao' => 'Atualizar'])
@endsection
