@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'register']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['users.update', $user], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif
<div class="row">
    <div class="col-md-4" id="imagem"></div>

    <div class="col-lg-8">
        @include('admin.shared.attributes.nome', ['nome' => $user->nome ?? old('nome')])
        @include('admin.shared.attributes.cargo', ['cargos' => $cargos, 'cargo2' =>  $user->cargo_id ?? old('cargo_id')])
        @include('admin.shared.attributes.secao', ['secoes' => $secoes, 'secao2' =>  $user->secao_id ?? old('secao_id')])

        @include('admin.shared.attributes.email', ['email' => $user->email ?? old('email')])

        @if($acao != 'Atualizar')
            @include('admin.shared.attributes.senha', ['label' => 'Senha', 'name' => 'password'])
            @include('admin.shared.attributes.senha', ['label' => 'Confirmação da Senha', 'name' => 'confirmacao_senha'])
        @endif

        @include('admin.shared.buttons', ['acao' => $acao, 'voltar_route' => route('users.index')])

        {{ Form::close() }}
    </div>
</div>