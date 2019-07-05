<div class="form-group" id="funcionamento">
	<label>Funcionamento</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="funcionamento" id="selectFuncionamento">
			@foreach (['Eficiente', 'Ineficiente'] as $tipo)
				<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
				</option>
			@endforeach
		</select>
	@endif

	@if($acao == 'atualizar')
		<select class="form-control" name="funcionamento">
			<option  id="{{ mb_strtolower($funcionamento) }}" value="{{ mb_strtolower($funcionamento) }}">{{ ucfirst ($funcionamento) }}
									{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Eficiente', 'Ineficiente'] as $tipo)
				@if ($funcionamento<>mb_strtolower($tipo))
					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
