@foreach ($municoes as $municao)

<tr align="center">
    <td> {{ mb_strtoupper($municao->tipo_municao) }} </td>
    <td> {{ $municao->marca->nome ?? '' }} </td>
    <td> {{ $municao->calibre->nome ?? '' }} </td>
    <td> {{ $municao->quantidade }} (Unidades)</td>
    <td></td>
    <td></td>
    <td>
        <a class="btn btn-primary" href="{{ route('municoes.edit', [$laudo, $municao]) }}">
            <i class="far fa-edit"></i>
        </a>

        <button value="{{ route('municoes.destroy', [$laudo, $municao]) }}" type="submit" class="btn btn-danger delete">
            <i class="far fa-trash-alt"></i>
        </button>
    </td>
</tr>
@endforeach