@extends('shared.table', ['card_name' => 'Laudos',
'model_name_plural' => 'Laudos',
'model_name_singular' => 'Laudo',
'route_create_name' => 'laudos.create',
'dados' => $laudos,
'ths' => ['REP', 'Ofício', 'Cidade', 'Órgão Solicitante']])

@section('table-content')
    @if (count($laudos) > 0)
        @foreach ($laudos as $laudo)
            <tr>
                <td> {{ $laudo->rep }}</td>
                <td> {{ $laudo->oficio }}</td>
                <td> {{ $laudo->cidade->nome }}</td>
                <td> {{ $laudo->solicitante->nome }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('laudos.show', $laudo) }}">
                        <i class="fa fa-fw fa-eye"></i> Visualizar</a>

                    <button value="{{ route('laudos.destroy', $laudo) }}" class="btn btn-danger delete">
                        <i class="fa fa-fw fa-trash"></i>
                        Deletar
                    </button>

                    <a class="btn btn-primary" href="{{ route('laudos.docx', $laudo) }}"><i
                                class="fa fa-download" aria-hidden="true"></i> Gerar Laudo</a>
                </td>
            </tr>
        @endforeach
    @endif
@endsection