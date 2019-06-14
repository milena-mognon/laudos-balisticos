@extends('admin.shared.table', ['card_name' => 'Listar Marcas',
'model_name_plural' => 'Marcas',
'model_name_singular' => 'Marca',
'route_create_name' => 'marcas.create',
'ths' => ['Nome', 'Categoria']])

@section('table-content')
    @if (count($marcas) > 0)
        @foreach ($marcas as $marca)
            <tr value="{{ $marca->id }}" name="">
                <td> {{ $marca->nome }}</td>
                <td> {{ $marca->categoria }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('marcas.edit', $marca) }}">
                        <i class="fa fa-pencil"></i> Editar</a>

                    <button value="{{ $marca }}" type="submit" class="btn btn-danger deletePais">
                        <i class="fa fa-trash"></i>
                        Deletar
                    </button>

                </td>
            </tr>
        @endforeach
    @endif
@endsection