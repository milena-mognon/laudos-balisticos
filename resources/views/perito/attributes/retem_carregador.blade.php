<div class="form-group">
	<label>Retém do Carregador</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="retem_carregador">
			@foreach (['Ambidestro', 'Lado Direito', 'Lado Esquerdo'] as $retem_carregador)
				<option value="{{ strtolower($retem_carregador) }}">{{ $retem_carregador }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="retem_carregador">
			<option value="{{ strtolower($retem_carregador) }}">{{ ucfirst ($retem_carregador) }}
						{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Ambidestro', 'Lado Direito', 'Lado Esquerdo'] as $tipo)
				@if ($retem_carregador<>strtolower($tipo))
					<option value="{{ strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
