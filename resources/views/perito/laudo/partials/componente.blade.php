@foreach ($componentes as $componente)

    <tr align="center">
        <td> {{ mb_strtoupper($componente->conteudo) }} </td>
        <td></td>
        <td></td>
        <td> {{ $componente->quantidade }}
            (@if(mb_strtoupper($componente->conteudo)=="ESPOLETAS") Unidades ) @else Gramas
            ) @endif </td>
        <td></td>
        <td></td>
        <td>
            <a class="btn btn-primary"
               href="{{ url("componente/$componente->id/edit") }}">
                <i class="fa fa-pencil"></i>Editar
            </a>
        </td>
        <td>
            <button value="{{ $componente->id }}" type="submit"
                    class="btn btn-danger deleteComponente"><i class="fa fa-trash"></i> Deletar
            </button>
        </td>
    </tr>
@endforeach