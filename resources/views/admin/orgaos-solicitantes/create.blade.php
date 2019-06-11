@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Órgão Solicitante' )
@section('card-content')
    {!! Form::open(['route' => 'solicitantes.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' =>  'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'cidade_id', 'label' => 'Cidade'])
            @include('admin.shared.select',
                ['id' => 'cidade_id', 'name' => 'cidade_id', 'dados' => $cidades, 'value' => ""])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('solicitantes.index') }}">Voltar</a>

            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
