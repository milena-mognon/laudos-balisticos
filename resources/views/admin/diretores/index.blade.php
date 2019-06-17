@extends('admin.shared.table', ['card_name' => 'Diretores',
'model_name_plural' => 'Diretores',
'model_name_singular' => 'Diretor',
'route_create_name' => 'diretores.create',
'ths' => ['Nome', 'Inicio da Direção', 'Fim da Direção']])

@section('table-content')
    @if (count($diretores) > 0)
        @foreach ($diretores as $diretor)
            <tr value="{{ $diretor->id }}" name="">
                <td> {{ $diretor->nome }}</td>
                <td>{{ formatar_data_do_bd($diretor->inicio_direcao) }}</td>
                <td>{{ formatar_data_do_bd($diretor->fim_direcao) }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('diretores.edit', ['diretor' => $diretor]) }}">
                        <i class="fa fa-pencil"></i> Editar</a>

                    <button value="{{ "/diretores/"  . $diretor->id }}" type="submit" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>
                        Deletar
                    </button>

                </td>
            </tr>
        @endforeach
    @endif
@endsection