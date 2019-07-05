<div class="form-group">
	<label>Comprimento do Cano</label>
	@if($acao == 'cadastrar')
			<input class="form-control" id="input2" name="comprimento_cano" placeholder="0,000 (metros)" required/>
	@endif

	@if($acao == 'atualizar')
			<input class="form-control" id="input2" name="comprimento_cano" placeholder="0,000 (metros)" value="{{ $comprimento_cano }}" required/>
	@endif
</div>
