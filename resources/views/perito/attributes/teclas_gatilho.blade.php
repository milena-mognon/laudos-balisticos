<div class="form-group" id="teclas_gatilho">
  <label>Teclas de Gatilho</label>
  @if($acao == 'cadastrar')
  <select class="form-control" name="teclas_gatilho">
    @if($arma == 'garrucha')
    @foreach (['Duas','Uma'] as $teclas_gatilho)
      <option id="{{ mb_strtolower($teclas_gatilho) }}" value="{{ mb_strtolower($teclas_gatilho) }}">{{ $teclas_gatilho }}
      </option>
    @endforeach
    @else
      @foreach (['Uma','Duas'] as $teclas_gatilho)
        <option id="{{ mb_strtolower($teclas_gatilho) }}" value="{{ mb_strtolower($teclas_gatilho) }}">{{ $teclas_gatilho }}
        </option>
      @endforeach
    @endif
  </select>
  @endif
  @if($acao == 'atualizar')
  <select class="form-control" name="teclas_gatilho">
    <option  id="{{ mb_strtolower($teclas_gatilho) }}" value="{{ mb_strtolower($teclas_gatilho) }}">{{ ucfirst ($teclas_gatilho) }}
              {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
    </option>
    @if($arma == 'garrucha')
    @foreach (['Duas','Uma'] as $tipo)
      @if ($teclas_gatilho<>mb_strtolower($tipo))
        <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
        </option>
      @endif
    @endforeach
    @else
      @foreach (['Uma','Duas'] as $tipo)
        @if ($teclas_gatilho<>mb_strtolower($tipo))
          <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
          </option>
        @endif
      @endforeach
    @endif
  </select>
  @endif
</div>
