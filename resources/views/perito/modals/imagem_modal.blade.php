<div class="modal fade" id="imagem-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Imagem</h4>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#"
                      enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                    {{ csrf_field() }}

                    <div class="dz-message">
                        <div class="col-xs-8">
                            <div class="message">
                                <p>Arraste uma imagem ou clique para adicionar</p>
                            </div>
                        </div>
                    </div>
                    <div class="fallback">
                        <input type="file" name="file">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
            </div>
        </div>
    </div>
</div>
