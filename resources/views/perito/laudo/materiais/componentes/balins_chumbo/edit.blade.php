@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Balins de Chumbo</h4>
    </div>
    <hr>
    @include('perito.laudo.materiais.componentes.balins_chumbo.form', ['acao' => 'Atualizar'])
@endsection