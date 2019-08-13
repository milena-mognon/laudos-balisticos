@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'diretores.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['diretores.update', $diretor], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">
        @include('admin.shared.attributes.nome', ['nome' => $diretor->nome ?? old('nome')])

        @include('shared.attributes.data',
        ['label' => 'Início da Direção', 'name' => 'inicio_direcao',
        'value' => $diretor->inicio_direcao ?? old('inicio_direcao')])

        @include('shared.attributes.data',
        ['label' => 'Fim da Direção','name' => 'fim_direcao',
        'value' => $diretor->fim_direcao ?? old('fim_direcao')])

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('diretores.index')])

        {{ Form::close() }}
    </div>
</div>