@foreach ($armas as $arma)

<tr>
    <td> {{ mb_strtoupper($arma->tipo_arma) }} </td>
    <td> {{ isset($arma->marca->nome) ? $arma->marca->nome : '' }} </td>
    <td> {{ $arma->calibre->nome ? $arma->calibre->nome : $arma->calibre_real }} </td>
    <td></td>
    <td> {{ $arma->num_serie }} </td>
    <td> {{ $arma->num_lacre }} </td>

    <td>
        <button value="{{ $arma->id }}" type="button" class="btn btn-success addImagem">
            <i class="fas fa-camera"></i>
        </button>

        <a class="btn btn-primary" href="{{ route(armas_route_name($arma->tipo_arma).'.edit', [$laudo, $arma]) }}">
            <i class="far fa-edit"></i>
        </a>
        <button value="{{ route('armas.destroy', [$laudo, $arma]) }}" type="submit" class="btn btn-danger delete">
            <i class="far fa-trash-alt"></i>
        </button>
    </td>
</tr>
@include('perito.modals.upload')
@endforeach