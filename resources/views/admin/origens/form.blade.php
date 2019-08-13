@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'origens.store']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['origens.update', $origem], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif
<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">

        @include('admin.shared.attributes.nome', ['nome' => $origem->nome ?? old('nome')])
        @include('admin.shared.attributes.fabricacao', ['fabricacao' => $origem->fabricacao ?? old('fabricacao')])

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('origens.index')])

        {{ Form::close() }}
    </div>
</div>