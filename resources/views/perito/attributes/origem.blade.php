@if($acao == 'cadastrar')
	<div class="form-group">
		<label>País de Origem</label>
		<select class="form-control" name="origem_id" id="pais">
			@foreach ($origens as $origem)
				<option value="{{ $origem->id }}">{{ $origem->nome }}
				</option>
			@endforeach
			<option value="outroPais">Outro(cadastrar)</option>
		</select>
</div>
@endif

@if($acao == 'atualizar')
	<div class="form-group">
		<label>País de Origem</label>
		<select class="form-control" name="origem_id">
			<option value="{{ $origem_id }}">{{ $origem }}
			</option>
			@foreach ($origens as $origem)
				@if($origem->id<>$origem_id)
					<option value="{{ $origem->id }}">{{ $origem->nome }}
					</option>
				@endif
			@endforeach
		</select>
</div>
@endif
