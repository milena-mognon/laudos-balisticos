@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'solicitantes.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['solicitantes.update', $solicitante], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $solicitante->nome ?? old('nome')])
@include('shared.attributes.cidades', ['cidades' => $cidades, 'cidade2' =>  $solicitante->cidade_id ?? old('cidade_id')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('solicitantes.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>
{{ Form::close() }}