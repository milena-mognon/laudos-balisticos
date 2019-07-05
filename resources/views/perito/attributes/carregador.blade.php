<div class="form-group">
	<label>Carregador</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="carregador">
			@foreach (['Monofilar', 'Bifilar'] as $carregador)
				<option value="{{ mb_strtolower($carregador) }}">{{ $carregador }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="carregador">
			<option value="{{ mb_strtolower($carregador) }}">{{ ucfirst ($carregador) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Monofilar', 'Bifilar'] as $carregador2)
				@if ($carregador<>mb_strtolower($carregador2))
					<option value="{{ mb_strtolower($carregador2) }}">{{ $carregador2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
