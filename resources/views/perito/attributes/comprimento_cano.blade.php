<div class="form-group">
	<label>Comprimento do Cano</label>
	@if($acao == 'cadastrar')
			<input class="form-control" id="input2" name="comprimento_cano"
				   placeholder="0,000 (metros)" autocomplete="off" required/>
	@endif

	@if($acao == 'atualizar')
			<input class="form-control" id="input2" name="comprimento_cano"
				   placeholder="0,000 (metros)" value="{{ $comprimento_cano }}"
				   autocomplete="off" required/>
	@endif
</div>
