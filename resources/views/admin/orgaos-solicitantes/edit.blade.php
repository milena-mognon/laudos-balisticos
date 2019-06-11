@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Órgão Solicitante' )
@section('card-content')
    {!! Form::open(['route' => ['solicitantes.update', $solicitante], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome', 'value' => $solicitante->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'cidade_id', 'label' => 'Cidade'])
            @include('admin.shared.select',
                ['id' => 'cidade_id', 'name' => 'cidade_id', 'dados' => $cidades, 'value' => $solicitante->cidade->id])
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('solicitantes.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Editar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
