@extends('layout.card')
@section('size', "col-md-8")
@section('card-name', 'Diretor' )
@section('card-content')
    {!! Form::open(['route' => ['diretores.update', $diretor], 'method' => 'patch']) !!}
    <div class="col-lg-12">
        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'nome', 'label' => 'Nome'])
            @include('admin.shared.input',
                ['id' => 'nome', 'type' => 'text', 'name' => 'nome', 'value' => $diretor->nome])
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'inicio_direcao', 'label' => 'Inicio da Direção'])
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('inicio_direcao') ? ' has-error' : '' }}">
                    <input class="form-control" type="text" id="calendario" name="inicio_direcao"
                           autocomplete="off" value="{{ $inicio_direcao }}" placeholder="__/__/____"/>
                    @if ($errors->has('inicio_direcao'))
                        <span class="help-block">
                  <strong style="color: red">{{ $errors->first('inicio_direcao') }}</strong>
              </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group row">
            @include('admin.shared.label', ['for_label' => 'fim_direcao', 'label' => 'Final da Direção'])
            <div class="col-md-8">
                <div class="form-group {{ $errors->has('fim_direcao') ? ' has-error' : '' }}">
                    <input class="form-control" type="text" id="calendario2" name="fim_direcao"
                           autocomplete="off" value="{{ $fim_direcao }}" placeholder="__/__/____"/>
                    @if ($errors->has('fim_direcao'))
                        <span class="help-block">
                  <strong style="color: red">{{ $errors->first('fim_direcao') }}</strong>
              </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <a class="btn btn-secondary float-left" href="{{ route('diretores.index') }}">Voltar</a>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success " type="submit">Editar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
