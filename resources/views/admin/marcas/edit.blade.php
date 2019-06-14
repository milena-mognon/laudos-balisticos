@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Editar Marca' )
@section('card-content')
    {!! Form::open(['route' => ['marcas.update', $marca], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome', 'value' => $marca->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fabricacao', 'label' => 'Fabricação'])
            @include('admin.shared.select_with_array',
                ['id' => 'categoria', 'name' => 'categoria', 'dados' => ['Armas', 'Munições'], 'value' => $marca->categoria])
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('marcas.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Editar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
