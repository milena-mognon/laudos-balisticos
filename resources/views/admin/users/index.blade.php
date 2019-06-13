@extends('admin.shared.table', ['card_name' => 'Listar Usuários',
'model_name_plural' => 'Usuários',
'model_name_singular' => 'Usuário',
'route_create_name' => 'register',
'ths' => ['Nome', 'Email', 'Cargo', 'Seção']])

@section('table-content')
    @if (count($users) > 0)
        @foreach ($users as $user)
            <tr value="{{ $user->id }}" name="">
                <td> {{ $user->nome }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ $user->cargo->nome }}</td>
                <td> {{ $user->secao->nome }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.edit', ['user' => $user]) }}">
                        <i class="fa fa-pencil"></i> Editar</a>

                    <button value="{{ $user }}" type="submit" class="btn btn-danger deletePais">
                        <i class="fa fa-trash"></i>
                        Deletar
                    </button>

                </td>
            </tr>
        @endforeach
    @endif
@endsection