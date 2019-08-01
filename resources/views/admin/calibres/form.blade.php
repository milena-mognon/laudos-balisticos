@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'calibres.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['calibres.update', $calibre], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $calibre->nome ?? old('nome')])
@include('admin.attributes.tipo_arma', ['tipo_arma2' => $calibre->tipo_arma ?? old('tipo_arma')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('calibres.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>
{{ Form::close() }}