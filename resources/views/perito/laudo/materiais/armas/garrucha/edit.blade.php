@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Garrucha</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.armas.garrucha.form', ['acao' => 'Atualizar'])
@endsection
