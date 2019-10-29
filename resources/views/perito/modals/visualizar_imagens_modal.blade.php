@component('layout.modal')
@slot('modal_id')
ver-imagens-modal
@endslot
@slot('modal_title')
Visualizar Imagens
@endslot
@slot('cadastro')
@endslot
<div class="table-responsive-sm div-ver-imagem">
    <div class="col-lg-6 float-right mb-2">
        <button value="{{ $arma_id }}" type="button" class="btn btn-block btn-success addImagem">
            <i class="fas fa-camera"></i> Cadastrar Imagem
        </button>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>Imagem</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @if (count($imagens) > 0)
            @foreach($imagens as $imagem)
            <tr align="center">
                <td><img src={{ asset('storage/imagens/'.$imagem->nome) }} class="imagem_arma"></td>
                <td><button value="{{ route('armas.images.delete', $imagem) }}" type="submit"
                        class="btn btn-danger delete">
                        <i class="far fa-trash-alt"></i> Deletar
                    </button></td>
            </tr>
            @endforeach
            @else
            <tr align="center">
                <td colspan="2">Nenhuma Imagem Encontrada</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endcomponent