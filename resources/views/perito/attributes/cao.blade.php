<div class="form-group">
	<label>Cão</label>
	@if($acao == 'cadastrar')
		<select class="form-control" name="cao">
			@foreach (['Exposto', 'Mecanismo Embutido'] as $cao)
				<option value="{{ strtolower($cao) }}">{{ $cao }}</option>
			@endforeach
		</select>
	@endif
	@if($acao == 'atualizar')
		<select class="form-control" name="cao">
			<option value="{{ strtolower($cao) }}">{{ ucfirst ($cao) }}
				{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
			</option>
			@foreach (['Exposto', 'Mecanismo Embutido'] as $cao2)
				@if ($cao<>strtolower($cao2))
					<option value="{{ strtolower($cao2) }}">{{ $cao2 }}
					</option>
				@endif
			@endforeach
		</select>
	@endif
</div>
