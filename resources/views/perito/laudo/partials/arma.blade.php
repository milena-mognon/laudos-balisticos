@foreach ($armas as $arma)

    <tr align="center">
        <td> {{ mb_strtoupper($arma->tipo_arma) }} </td>
        <td> {{ $arma->marca->nome }} </td>
        <td> {{ $arma->calibre->nome }} </td>
        <td></td>
        <td> {{ $arma->num_serie }} </td>
        <td> {{ $arma->num_lacre }} </td>

        <td>
            <button value="{{ $arma->id }}" type="button" class="btn btn-success">
                <i class="fas fa-plus"></i>
                Imagens
            </button>

            <a class="btn btn-primary" href="{{ route('armas.edit', [$laudo, $arma]) }}">
                <i class="far fa-edit"></i> Editar
            </a>

            <button value="{{ route('armas.destroy', $arma) }}" type="submit"
                    class="btn btn-danger delete"><i class="far fa-trash-alt"></i>
                Deletar
            </button>
        </td>
    </tr>
@endforeach