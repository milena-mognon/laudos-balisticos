@if ($acao == 'Cadastrar')
    {!! Form::open(['route' => 'register']) !!}
@elseif ($acao == 'Atualizar')
    {!! Form::open(['route' => ['users.update', $user], 'method' => 'patch']) !!}
@else
    {!! Form::open() !!}
@endif

@include('admin.attributes.nome', ['nome' => $user->nome ?? old('nome')])
@include('admin.attributes.cargo', ['cargos' => $cargos, 'cargo2' =>  $user->cargo_id ?? old('cargo_id')])
@include('admin.attributes.secao', ['secoes' => $secoes, 'secao2' =>  $user->secao_id ?? old('secao_id')])

@include('admin.attributes.email', ['email' => $user->email ?? old('email')])

@if($acao != 'Atualizar')
    @include('admin.attributes.senha', ['label' => 'Senha', 'name' => 'password'])
    @include('admin.attributes.senha', ['label' => 'Confirmação da Senha', 'name' => 'confirmacao_senha'])
@endif

<div class="col-lg-10 float-right">
    <a class="btn btn-secondary" href="{{ route('users.index') }}">Voltar</a>
    <button class="btn btn-success" type="submit">{{ $acao }}</button>
</div>

{{ Form::close() }}