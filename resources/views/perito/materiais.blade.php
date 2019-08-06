@extends('layout.component')
@section('page')
    <div class="col-12">
        <h4>Selecione o Material</h4>
    </div>
    <hr>
    <h5>Armas de fogo</h5>
    <input type="hidden" name="laudo_id" value="{{$laudo}}">
    <div class="col-lg-4">
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Revólver', 'route' => 'armas.create', 'laudo' => $laudo])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Garrucha', 'route' => 'armas.create'])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Pistola', 'route' => 'armas.create'])
        @include('shared.block_button', ['col_name' => 'tipo_arma', 'value' => 'Espingarda', 'route' => 'armas.create'])



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