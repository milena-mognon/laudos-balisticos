<div class="form-group" id="disposicao_canos">
  <label>Disposição dos Canos</label>
  @if($acao == 'cadastrar')
  <div class="form-group" >
    <select class="form-control" name="disposicao_canos">
  			@foreach (['Justapostos', 'Sobrepostos'] as $disposicao_canos)
  				<option id="{{ mb_strtolower($disposicao_canos) }}" value="{{ mb_strtolower($disposicao_canos) }}">{{ $disposicao_canos }}
  				</option>
  			@endforeach
  		</select>
  </div>
  @endif
  @if($acao == 'atualizar')
  <select class="form-control" name="disposicao_canos">
  			<option  id="{{ mb_strtolower($disposicao_canos) }}" value="{{ mb_strtolower($disposicao_canos) }}">{{ ucfirst ($disposicao_canos) }}
  								{{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
  			</option>
  			@foreach (['Justapostos', 'Sobrepostos'] as $tipo)
  				@if ($disposicao_canos<>mb_strtolower($tipo))
  					<option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
  					</option>
  				@endif
  			@endforeach
  		</select>
  @endif
</div>
