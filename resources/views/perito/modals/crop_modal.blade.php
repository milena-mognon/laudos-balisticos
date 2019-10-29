@component('layout.modal')
@slot('modal_id')
crop-modal
@endslot
@slot('modal_title')
Recortar Imagem
@endslot
<div id="wrapper">
    <div id="image-holder" style="max-width: 750px"></div>
</div>

<div class="btn-group">
    <button type="button" class="btn btn-primary" id="girarEsquerda"><i class="fas fa-rotate-left"></i>
    </button>
    <button type="button" class="btn btn-primary" id="girarDireita"><i class="fa fa-rotate-right"></i>
    </button>
</div>

<button type="button" class="btn btn-success" id="uploadCroppedImage">Recortar e Salvar</button>
@endcomponent