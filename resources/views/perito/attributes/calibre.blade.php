<div class="form-group">
	<label>Calibre Nominal</label>
	@if($acao == 'cadastrar')
	<select class="form-control" name="calibre_id" id="calibre">
				@foreach ($calibres as $calibre)
						<option value="{{ $calibre->id }}">{{ $calibre->calibre }}
						</option>
				@endforeach
				<option value="outroCalibre">Outro(cadastrar)</option>
			</select>
	@endif

	@if($acao == 'atualizar')
	<select class="form-control" name="calibre_id" id="calibre">
				<option value="{{ $calibre_id }}">{{ $calibre }} </option>
				@foreach ($calibres as $calibre)
						@if($calibre->id<>$calibre_id)
							<option value="{{ $calibre->id }}">{{ $calibre->calibre }}
							</option>
						@endif
				@endforeach
			</select>
	@endif
</div>
