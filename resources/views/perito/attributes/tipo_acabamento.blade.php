<div class="form-group">
	<label>Tipo de Acabamento</label>
	@if($acao == 'cadastrar')
	<select class="form-control" name="tipo_acabamento">
			@foreach (['Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado'] as $acabamento)
				<option value="{{ mb_strtolower($acabamento) }}">{{ $acabamento }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
	<select class="form-control" name="tipo_acabamento">
			<option value="{{ mb_strtolower($tipo_acabamento) }}">{{ ucfirst ($tipo_acabamento) }}
						{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Desprovido', 'Cromado', 'Emborrachado', 'Niquelado', 'Oxidado'] as $tipo)
				@if ($tipo_acabamento<>mb_strtolower($tipo))
					<option value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
