@extends('shared.table', ['card_name' => 'Órgãos Solicitantes',
'model_name_plural' => 'Órgãos Solicitantes',
'model_name_singular' => 'Órgão Solicitante',
'route_create_name' => 'solicitantes.create',
'dados' => $solicitantes,
'ths' => ['Nome', 'Cidade']])

@section('table-content')
    @if (count($solicitantes) > 0)
        @foreach ($solicitantes as $solicitante)
            <tr>
                <td> {{ $solicitante->nome }}</td>
                <td> {{ $solicitante->cidade->nome }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('solicitantes.edit', $solicitante) }}">
                        <i class="fa fa-fw fa-edit"></i> Editar</a>

                    <button value="{{ route('solicitantes.destroy', $solicitante) }}" class="btn btn-danger delete">
                        <i class="fa fa-fw fa-trash"></i>
                        Deletar
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
@endsection