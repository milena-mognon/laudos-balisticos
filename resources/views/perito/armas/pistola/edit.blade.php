@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Pistola</h4>
    </div>
    <hr>
    @include('perito.armas.pistola.form', ['acao' => 'Atualizar'])
@endsection
