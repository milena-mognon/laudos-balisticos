<div class="form-group">
	<label>Tipo da Arma</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="tipo_arma" id="tipo_arma">
			@foreach (['Espingarda Artesanal', 'Pistolete Artesanal'] as $tipo_arma)
				<option value="{{ mb_strtolower($tipo_arma) }}">{{ $tipo_arma }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="tipo_arma" id="tipo_arma">
			<option value="{{ mb_strtolower($tipo_arma) }}">{{ ucfirst ($tipo_arma) }}
						{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Espingarda Artesanal', 'Pistolete Artesanal'] as $tipo)
				@if ($tipo_arma<>mb_strtolower($tipo))
					<option value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
