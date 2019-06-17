@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'País' )
@section('card-content')
    {!! Form::open(['route' => ['origens.update', $origem], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input', [ 'name' => 'nome', 'value' => $origem->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fabricacao', 'label' => 'Fabricação'])
            @include('admin.shared.input',
                ['id' => 'fabricacao', 'type' => 'text', 'name' => 'fabricacao', 'value' => $origem->fabricacao])
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('origens.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Editar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
