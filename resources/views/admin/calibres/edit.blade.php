@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Editar Calibre' )
@section('card-content')
    {!! Form::open(['route' => ['calibres.update', $calibre], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['name' => 'nome', 'value' => $calibre->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'tipo_arma', 'label' => 'Utilizado em:'])
            @include('admin.shared.select_with_array',
                ['name' => 'tipo_arma', 'dados' => ['Espingarda', 'Revólver', 'Pistola'], 'value' => $calibre->tipo_arma])
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('calibres.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Editar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
