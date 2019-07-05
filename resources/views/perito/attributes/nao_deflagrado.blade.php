
<div class="form-group">
      <div class="custom-control custom-checkbox mr-sm-2">
        @if($acao == 'cadastrar')
        <input type="checkbox" class="custom-control-input" name="nao_deflagrado" id="naoDeflagrado">
        <label class="custom-control-label" for="naoDeflagrado">Percutido e Não Deflagrado</label>
      @endif
      @if($acao == 'atualizar')
        <input type="checkbox" class="custom-control-input" name="nao_deflagrado" id="naoDeflagrado">
        <label class="custom-control-label" for="naoDeflagrado">Percutido e Não Deflagrado</label>
      @endif
      </div>
    </div>
