@extends('new_layout.component')
@section('page')

    <div class="col-8">
        <h4>Editar Marca</h4>
    </div>
    <hr>
    {!! Form::open(['route' => ['marcas.update', $marca], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('shared.input',
                ['name' => 'nome', 'value' => $marca->nome])
        </div>

        <div class="form-group row">
            @include('shared.label', ['for_label' => 'fabricacao', 'label' => 'Fabricação'])
            @include('shared.input',
                ['name' => 'nome', 'value' => $marca->fabricacao])
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('marcas.index') }}">Voltar</a>
            <button class="btn btn-success " type="submit">Editar</button>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@endsection
