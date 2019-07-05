<div class="form-group" id="chaveAbertura">
	<label>Chave de Abertura</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="chave_abertura">
			@foreach (['Região Superior ao Delgado', 'Região Anterior ao Guarda-Mato', 'Guarda-Mato', 'Lateral Esquerda', 'Lateral Direita'] as $chave_abertura)
				<option value="{{ mb_strtolower($chave_abertura) }}">{{ $chave_abertura }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="chave_abertura">
			<option value="{{ mb_strtolower($chave_abertura) }}">{{ ucfirst ($chave_abertura) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Região Superior ao Delgado', 'Região Anterior ao Guarda-Mato', 'Guarda-Mato', 'Lateral Esquerda', 'Lateral Direita'] as $chave_abertura2)
				@if ($chave_abertura<>mb_strtolower($chave_abertura2))
					<option value="{{ mb_strtolower($chave_abertura2) }}">{{ $chave_abertura2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
