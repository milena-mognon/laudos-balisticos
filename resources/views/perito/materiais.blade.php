@extends('new_layout.component')
@section('page')
    <div class="col-12">
        <h4>Selecione o Material</h4>
    </div>
    <hr>
    <h5>Armas de fogo</h5>
    <div class="col-lg-4">
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Revólver', 'route' => 'revolveres.create', 'laudo_id' => $laudo_id])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Garrucha', 'route' => 'revolveres.create'])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Pistola', 'route' => 'revolveres.create'])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Espingarda', 'route' => 'revolveres.create'])



        {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Garrucha</button>--}}
        {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Pistola</button>--}}
        {{--<button type="button" class="btn btn-secondary btn-lg btn-block">Espingarda</button>--}}
    </div>
    <hr>
    <h5>Munições, Estojos e Projéteis</h5>
    <div class="col-lg-4">
        <button type="button" class="btn btn-secondary btn-lg btn-block">Munição Arma Curta</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block">Munição Arma Longa</button>
    </div>
    <hr>
    <h5>Componentes</h5>
    <div class="col-lg-4">
        <button type="button" class="btn btn-secondary btn-lg btn-block">Balins de Chumbo</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block">Espoletas</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block">Pólvora</button>
    </div>
    <hr>
    <h5>Arma Branca</h5>
    <div class="col-lg-4">
        <button type="button" class="btn btn-secondary btn-lg btn-block">Faca</button>
    </div>
@endsection