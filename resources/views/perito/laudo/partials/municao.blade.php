@foreach ($municoes as $municao)

    <tr align="center">
        <td> {{ mb_strtoupper($municao->tipo) }} </td>
        <td> {{ $municao->marca }} </td>
        <td> {{ $municao->calibre }} </td>
        <td> {{ $municao->quantidade }} (Unidades)</td>
        <td></td>
        <td></td>
        <td>
            <a class="btn btn-primary" href="{{ url("municao/$municao->id/edit") }}">
                <i class="fa fa-pencil"></i> Editar
            </a>
        </td>
        <td>
            <button value="{{ $municao->id }}" type="submit"
                    class="btn btn-danger deleteMunicao">
                <i class="fa fa-trash"></i> Deletar
            </button>
        </td>
    </tr>
@endforeach