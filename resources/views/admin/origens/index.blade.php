@extends('admin.shared.table', ['card_name' => 'Países',
'model_name_plural' => 'Países',
'model_name_singular' => 'País',
'route_create_name' => 'origens.create',
'ths' => ['Nome', 'Fabricação']])

@section('table-content')
    @if (count($origens) > 0)
        @foreach ($origens as $origem)
            <tr value="{{ $origem->id }}" name="">
                <td> {{ $origem->nome }}</td>
                <td> {{ $origem->fabricacao }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('origens.edit', ['origen' => $origem]) }}">
                        <i class="fa fa-pencil"></i> Editar</a>

                    <button value="{{ $origem }}" type="submit" class="btn btn-danger deletePais">
                        <i class="fa fa-trash"></i>
                        Deletar
                    </button>

                </td>
            </tr>
        @endforeach
    @endif
@endsection