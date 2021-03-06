@extends('shared.table', ['card_name' => 'Listar Usuários',
'model_name_plural' => 'Usuários',
'model_name_singular' => 'Usuário',
'habilitar_pesquisa' => true,
'pesquisar' => 'Digite o nome do usuário',
'route_search_name' => 'users',
'route_create_name' => 'register',
'dados' => $users,
'ths' => ['Nome', 'Email', 'Cargo', 'Seção']])

@section('table-content')
@if (count($users) > 0)
@foreach ($users as $user)
<tr>
    <td> {{ $user->nome }}</td>
    <td> {{ $user->email }}</td>
    <td> {{ $user->cargo->nome }}</td>
    <td> {{ $user->secao->nome }}</td>
    <td>
        <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">
            <i class="fa fa-fw fa-edit"></i> Editar</a>

        <button value="{{ route('users.destroy', $user)  }}" type="submit" class="btn btn-danger delete">
            <i class="fa fa-fw fa-trash"></i>
            Deletar
        </button>
    </td>
</tr>
@endforeach
@endif
@endsection