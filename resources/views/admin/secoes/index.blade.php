@extends('shared.table', ['card_name' => 'Seções',
'model_name_plural' => 'Seções',
'model_name_singular' => 'Seção',
'route_create_name' => 'secoes.create',
'ths' => ['Nome']])

@section('table-content')
    @if (count($secoes) > 0)
        @foreach ($secoes as $secao)
            <tr value="{{ $secao->id }}" name="">
                <td> {{ $secao->nome }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('secoes.edit', ['origen' => $secao]) }}">
                        <i class="fa fa-fw fa-edit"></i> Editar</a>

                    <button value="{{ "/secoes/"  . $secao->id }}" type="submit" class="btn btn-danger delete">
                        <i class="fa fa-fw fa-trash"></i>
                        Deletar
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
@endsection