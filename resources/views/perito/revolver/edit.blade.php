@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Atualizar Revólver</h4>
    </div>
    <hr>
    @include('perito.revolver.form', ['acao' => 'Atualizar'])
@endsection
