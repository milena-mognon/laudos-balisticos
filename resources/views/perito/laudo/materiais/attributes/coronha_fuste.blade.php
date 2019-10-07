<div class="col-lg-3">
	<div class="form-group">
		<label>Coronha e Fuste *</label>
		<select class="js-single form-control{{ $errors->has('coronha_fuste') ? ' is-invalid' : '' }}" name="coronha_fuste">
			@foreach (['Madeira', 'Material Sintético', 'Desprovido'] as $coronha_fuste)
				<option value="{{ mb_strtolower($coronha_fuste)}}" {{ (mb_strtolower($coronha_fuste) == mb_strtolower($coronha_fuste2)) ? 'selected=selected' : '' }}>
					{{$coronha_fuste}}
				</option>
			@endforeach
		</select>
		@include('shared.error_feedback', ['name' => 'coronha_fuste'])
	</div>
</div>