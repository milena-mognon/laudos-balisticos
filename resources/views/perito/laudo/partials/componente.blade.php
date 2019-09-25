@foreach ($componentes as $componente)

    <tr align="center">
        <td> {{ mb_strtoupper($componente->componente) }} </td>
        <td></td>
        <td></td>
        <td> {{ $componente->quantidade }}
            (@if(mb_strtoupper($componente->componente)=="ESPOLETAS") Unidades ) @else Gramas
            ) @endif </td>
        <td></td>
        <td></td>
        <td>
            <a class="btn btn-primary"
               href="{{ route('componentes.edit', [$laudo, $componente]) }}">
                <i class="far fa-edit"></i>
            </a>
            <button value="{{ route('componentes.destroy', [$laudo, $componente]) }}" type="submit"
                    class="btn btn-danger delete">
                <i class="far fa-trash-alt"></i>
            </button>
        </td>
    </tr>
@endforeach