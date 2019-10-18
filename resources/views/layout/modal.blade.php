<div class="modal fade" id="{{ $modal_id }}" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ $modal_title }}</h4>
          <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <div class="modal-body">
        <p>{{ $cadastro ?? 'Atenção! Antes de cadastrar, certifique-se que a escrita está certa.'}}</p>
          {{ $slot }}
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
        </div>
      </div>
    </div>
  </div>
  