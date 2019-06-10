@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', __('atributes.user.user') )
@section('card-content')
    {!! Form::open(['route' => 'origens.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fabricacao', 'label' => 'Fabricação'])
            @include('admin.shared.input',
                ['id' => 'fabricacao', 'type' => 'text', 'name' => 'fabricacao'])
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('origens.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Cadastrar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
