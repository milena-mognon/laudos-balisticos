<div class="form-group">
	<label>Tipo da Munição</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="tipo" id="tipo">
			@foreach (['Cartucho', 'Estojo'] as $tipo_municao)
				<option value="{{ mb_strtolower($tipo_municao) }}">{{ $tipo_municao }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="tipo" id="tipo">
			<option value="{{ mb_strtolower($tipo_municao) }}">{{ ucfirst ($tipo_municao) }}
						{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Cartucho', 'Estojo'] as $tipo)
				@if ($tipo_municao<>mb_strtolower($tipo))
					<option value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
