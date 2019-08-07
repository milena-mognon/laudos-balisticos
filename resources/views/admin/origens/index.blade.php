@extends('shared.table', ['card_name' => 'Países',
'model_name_plural' => 'Países',
'model_name_singular' => 'País',
'route_create_name' => 'origens.create',
'ths' => ['Nome', 'Fabricação']])

@section('table-content')
    @if (count($origens) > 0)
        @foreach ($origens as $origem)
            <tr>
                <td> {{ $origem->nome }}</td>
                <td> {{ $origem->fabricacao }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('origens.edit', $origem) }}">
                        <i class="fa fa-fw fa-edit"></i> Editar</a>

                    <button value="{{ route('origens.destroy', $origem) }}" class="btn btn-danger delete">
                        <i class="fa fa-fw fa-trash"></i>
                        Deletar
                    </button>
                </td>
            </tr>
        @endforeach
    @endif
@endsection