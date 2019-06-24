@extends('new_layout.component')
@section('page')
    <div class="col-8">
        <h4>Cadastrar Órgão Solicitante</h4>
    </div>
    <hr>
    {!! Form::open(['route' => 'solicitantes.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' =>  'Nome'])
            @include('shared.input', ['name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'cidade_id', 'label' => 'Cidade'])
            @include('shared.select_with_id',
            ['name' => 'cidade_id', 'dados' => $cidades, 'value' => ""])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('solicitantes.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
