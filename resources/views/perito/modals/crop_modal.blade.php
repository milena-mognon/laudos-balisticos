<div class="modal fade" id="crop-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recortar Imagem</h4>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">

                <div id="wrapper">
                    <div id="image-holder" style="max-width: 750px"></div>
                </div>

                {{--<div class="btn-group">--}}

                {{--<button type="button" class="btn btn-primary" id="girarEsquerda"><i class="fas fa-rotate-left"></i>--}}
                {{--</button>--}}
                {{--<button type="button" class="btn btn-primary" id="girarDireita"><i class="fa fa-rotate-right"></i>--}}
                {{--</button>--}}
                {{--</div>--}}

                <button type="button" class="btn btn-success" id="uploadCroppedImage">Recortar e Salvar</button>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
            </div>
        </div>

    </div>
</div>