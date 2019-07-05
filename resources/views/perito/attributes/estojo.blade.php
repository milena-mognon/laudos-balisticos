<div class="form-group" id="estojo">
    <label>Estojo</label>

	@if($acao == 'cadastrar')
		<select class="form-control" name="estojo" id="estojo">
			@foreach (['Metálico', 'Plástico com Culote Metálico' ,'Papelão com Culote Metálico'] as $estojo)
				<option id="{{ mb_strtolower($estojo) }}" value="{{ mb_strtolower($estojo) }}">{{ $estojo }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="estojo" id="estojo">
			<option  id="{{ mb_strtolower($estojo) }}" value="{{ mb_strtolower($estojo) }}">{{ ucfirst ($estojo) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Metálico', 'Plástico com Culote Metálico' ,'Papelão com Culote Metálico'] as $tipo)
				@if ($estojo<>strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
