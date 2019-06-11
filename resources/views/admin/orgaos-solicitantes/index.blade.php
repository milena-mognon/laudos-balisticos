@extends('admin.shared.table', ['card_name' => 'Órgãos Solicitantes',
'model_name_plural' => 'Órgãos Solicitantes',
'model_name_singular' => 'Órgão Solicitante',
'route_create_name' => 'solicitantes.create',
'ths' => ['Nome', 'Cidade']])

@section('table-content')
    @if (count($solicitantes) > 0)
        @foreach ($solicitantes as $solicitante)
            <tr value="{{ $solicitante->id }}" name="">
                <td> {{ $solicitante->nome }}</td>
                <td> {{ $solicitante->cidade->nome }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('solicitantes.edit', ['origen' => $solicitante]) }}">
                        <i class="fa fa-pencil"></i> Editar</a>

                    <button value="{{ $solicitante }}" type="submit" class="btn btn-danger deletePais">
                        <i class="fa fa-trash"></i>
                        Deletar
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
@endsection