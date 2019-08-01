@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'diretores.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['diretores.update', $diretor], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $diretor->nome ?? old('nome')])

@include('shared.attributes.data',
['label' => 'Início da Direção', 'name' => 'inicio_direcao',
'value' => formatar_data_do_bd($diretor->inicio_direcao) ?? old('inicio_direcao')])

@include('shared.attributes.data',
['label' => 'Fim da Direção','name' => 'fim_direcao',
'value' => formatar_data_do_bd($diretor->fim_direcao) ?? old('fim_direcao')])

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('diretores.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>
{{ Form::close() }}