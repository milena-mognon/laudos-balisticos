@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Diretor' )
@section('card-content')
    {!! Form::open(['route' => 'diretores.store']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input', ['name' => 'nome'])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'inicio_direcao', 'label' => 'Inicio da Direção'])
            <div class="col-md-8">
                <input class="form-control {{ $errors->has('inicio_direcao') ? ' is-invalid' : '' }}"
                       type="text" id="calendario" name="inicio_direcao"
                       autocomplete="off" value="{{old('inicio_direcao')}}" placeholder="__/__/____"/>
                @if ($errors->has('inicio_direcao'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('inicio_direcao') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fim_direcao', 'label' => 'Final da Direção'])
            <div class="col-md-8">
                <input class="form-control  {{ $errors->has('fim_direcao') ? ' is-invalid' : '' }}"
                       type="text" id="calendario2" name="fim_direcao"
                       autocomplete="off" value="{{old('fim_direcao')}}" placeholder="__/__/____"/>
                @if ($errors->has('fim_direcao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fim_direcao') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-lg-10 float-right">
            <a class="btn btn-secondary" href="{{ route('diretores.index') }}">Voltar</a>
            <button class="btn btn-success" type="submit">Cadastrar</button>
            {{ Form::close() }}
        </div>
    </div>
@endsection
