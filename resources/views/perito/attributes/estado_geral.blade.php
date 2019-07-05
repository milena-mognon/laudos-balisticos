<div class="form-group">
		<label>Estado Geral</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="estado_geral">
			@foreach (['Regular','Bom', 'Mau'] as $estado_geral)
				<option id="{{ strtolower($estado_geral) }}" value="{{ strtolower($estado_geral) }}">{{ $estado_geral }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="estado_geral">
			<option  id="{{ strtolower($estado_geral) }}" value="{{ strtolower($estado_geral) }}">{{ ucfirst ($estado_geral) }}
								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Regular','Bom', 'Mau'] as $tipo)
				@if ($estado_geral<>strtolower($tipo))
					<option id="{{ strtolower($tipo) }}" value="{{ strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
