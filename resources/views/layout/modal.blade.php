<div class="modal fade" id="{{ $modal_id }}" role="dialog">
  <div class="modal-dialog modal-{{ $modal_size }} modal-color" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ $modal_title }}</h4>
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
        <p class="modal-atention-info">
          <strong>{{ $cadastro ?? 'Atenção! Antes de cadastrar, certifique-se que a escrita está correta.'}}
          </strong></p>
        {{ $slot }}
      </div>
    </div>
  </div>
</div>