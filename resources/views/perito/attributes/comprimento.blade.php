<div class="form-group">
		<label>Comprimento</label>
	@if($acao == 'cadastrar')
			<input class="form-control" id="input3" name="comprimento" placeholder="0,000 (metros)" required/>
	@endif

	@if($acao == 'atualizar')
			<input class="form-control" id="input3" name="comprimento" placeholder="0,000 (metros)" value="{{ $comprimento }}" required />
	@endif
</div>
