@extends('shared.table', ['card_name' => 'Seções',
'model_name_plural' => 'Seções',
'model_name_singular' => 'Seção',
'route_create_name' => 'secoes.create',
'pesquisar' => 'Digite o nome da seção',
'route_search_name' => 'secoes',
'dados' => $secoes,
'ths' => ['Nome']])

@section('table-content')
@if (count($secoes) > 0)
@foreach ($secoes as $secao)
<tr>
    <td> {{ $secao->nome }}</td>
    <td>
        <a class="btn btn-primary" href="{{ route('secoes.edit', $secao) }}">
            <i class="fa fa-fw fa-edit"></i> Editar</a>

        <button value="{{ route('secoes.destroy', $secao) }}" class="btn btn-danger delete">
            <i class="fa fa-fw fa-trash"></i>
            Deletar
        </button>
    </td>
</tr>
@endforeach
@endif
@endsection