<div class="form-group">
	<label>Coronha e Fuste</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="coronha">
			@foreach (['Madeira', 'Material Sintético', 'Desprovido'] as $coronha)
				<option value="{{ strtolower($coronha) }}">{{ $coronha }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="coronha">
			<option value="{{ strtolower($coronha) }}">{{ ucfirst ($coronha) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Madeira', 'Material Sintético', 'Desprovido'] as $coronha2)
				@if ($coronha<>strtolower($coronha2))
					<option value="{{ strtolower($coronha2) }}">{{ $coronha2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>