<div class="modal fade" id="imagem-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Imagens - <strong>{{ $arma->tipo_arma }} lacre nº {{ $arma->num_lacre }}</strong></h4>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <h5 id="image-info">É possível adicionar até 3 imagens por arma, porém elas devem ser adicionadas
                    separadamente para realizar o recorte. <br>
                <strong>A imagem só será salva na tela de recorte.</strong> </h5>
                <form method="post" action="#"
                      enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                    {{ csrf_field() }}

                    <div class="dz-message">


                        <div class="col-xs-8">
                            <div class="message">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>
