@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Espingarda Artesanal</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.armas.espingarda_artesanal.form', ['acao' => 'Atualizar'])
@endsection
