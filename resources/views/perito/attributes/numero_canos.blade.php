<div class="form-group">
	<label>Número de Canos</label>
	@if($acao == 'cadastrar')
	<select class="form-control" name="num_canos" id="num_canos">
		@if($arma == 'garrucha')
			@foreach (['Dois', 'Um'] as $num_canos)
				<option id="{{ mb_strtolower($num_canos) }}" value="{{ mb_strtolower($num_canos) }}">{{ $num_canos }}
				</option>
			@endforeach
		@else
			@foreach (['Um', 'Dois'] as $num_canos)
				<option id="{{ mb_strtolower($num_canos) }}" value="{{ mb_strtolower($num_canos) }}">{{ $num_canos }}
				</option>
			@endforeach
		@endif
		</select>
		<p></p>
	@endif

	@if($acao == 'atualizar')
	<select class="form-control" name="num_canos" id="num_canos">
			<option  id="{{ mb_strtolower($num_canos) }}" value="{{ mb_strtolower($num_canos) }}">{{ ucfirst ($num_canos) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Um', 'Dois'] as $tipo)
				@if ($num_canos<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
