@extends('shared.table', ['card_name' => 'Laudos',
'model_name_plural' => 'Laudos',
'model_name_singular' => 'Laudo',
'pesquisar' => 'Digite o número da REP',
'route_search_name' => 'laudos',
'route_create_name' => 'laudos.create',
'dados' => $laudos,
'ths' => ['REP', 'Ofício', 'Cidade', 'Órgão Solicitante',]])

@section('table-content')
@if (count($laudos) > 0)
@foreach ($laudos as $laudo)
<tr>
    <td> {{ $laudo->rep }}</td>
    <td> {{ $laudo->oficio }}</td>
    <td> {{ $laudo->cidade->nome }}</td>
    <td> {{ $laudo->solicitante->nome }}</td>
    <td>
        <a class="btn btn-primary mt-1" href="{{ route('laudos.show', $laudo) }}">
            <i class="fa fa-fw fa-eye"></i></a>
        <a class="btn btn-primary mt-1" href="{{ route('laudos.docx', $laudo) }}">
            <i class="fa fa-download" aria-hidden="true"></i></a>
        <button value="{{ route('laudos.destroy', $laudo) }}" class="btn btn-danger delete mt-1">
            <i class="fa fa-fw fa-trash"></i>
        </button>
    </td>
</tr>
@endforeach
@else
<tr>
    <td colspan="5">Nenhum Laudo Encontrado</td>
</tr>
@endif
@endsection