@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'País' )
@section('card-content')
    {!! Form::open(['route' => 'origens.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input', [ 'name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fabricacao', 'label' => 'Fabricação'])
            @include('admin.shared.input', ['name' => 'fabricacao'])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('origens.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
