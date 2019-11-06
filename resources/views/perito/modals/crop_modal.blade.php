@component('layout.modal')
@slot('modal_id')
crop-modal
@endslot
@slot('modal_title')
Recortar Imagem
@endslot
@slot('cadastro')
@endslot
@slot('modal_size')
lg
@endslot
<div id="wrapper">
    <div id="image-holder" style="max-width: 750px"></div>
</div>

<div class="row mb-3">
    <div class="col-lg-4 mt-2">
        <button type="button" class="btn btn-primary btn-block" id="girarEsquerda">
            <i class="fas fa-undo-alt"></i> Girar para esquerda
        </button>
    </div>
    <div class="col-lg-4 mt-2">
        <button type="button" class="btn btn-primary btn-block" id="girarDireita">
            <i class="fas fa-redo-alt"></i> Girar para direita
        </button>
    </div>
    <div class="col-lg-4 mt-2">
        <button type="button" class="btn btn-success btn-block" id="uploadCroppedImage">
            <i class="fas fa-crop-alt"></i>Recortar e Salvar</button>
    </div>
</div>

@endcomponent