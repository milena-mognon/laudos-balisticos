<div class="form-group" id="projetil">
  @if($cal=="Comum")
    <label>Projétil (formato)</label>
  @endif
  @if($cal=="Espingarda")
    <label>Projétil (carga de projeção)</label>
  @endif
        @if($acao == 'cadastrar' && $cal == 'Comum')
            <select class="form-control" name="projetil" id="projetil">
                @foreach (['Ponta Ogival','Ponta Plana', 'Ponta Oca' ,'Canto-vivo ','Semi canto-vivo'] as $projetil)
                    <option id="{{ mb_strtolower($projetil) }}" value="{{ mb_strtolower($projetil) }}">{{ $projetil }}
                    </option>
                @endforeach
            </select>
        @endif

        @if($acao == 'atualizar' && $cal == 'Comum')
            <select class="form-control" name="projetil" id="projetil">
                <option  id="{{ mb_strtolower($projetil) }}" value="{{ mb_strtolower($projetil) }}">{{ ucfirst ($projetil) }}
                                    {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
                </option>
                @foreach (['Ponta Ogival','Ponta Plana', 'Ponta Oca' ,'Canto-vivo ','Semi canto-vivo'] as $tipo)
                    @if ($projetil<>mb_strtolower($tipo))
                        <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
                        </option>
                    @endif
                @endforeach
            </select>
        @endif

        @if($acao == 'cadastrar' && $cal == 'Espingarda')
            <select class="form-control" name="projetil" id="projetil">
                @foreach (['Balins de Chumbo', 'Balote'] as $projetil)
                    <option id="{{ mb_strtolower($projetil) }}" value="{{ mb_strtolower($projetil) }}">{{ $projetil }}
                    </option>
                @endforeach
            </select>
        @endif

        @if($acao == 'atualizar' && $cal == 'Espingarda')
            <select class="form-control" name="projetil" id="projetil">
                <option  id="{{ mb_strtolower($projetil) }}" value="{{ mb_strtolower($projetil) }}">{{ ucfirst ($projetil) }}
                                    {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
                </option>
                @foreach (['Balins de Chumbo', 'Balote'] as $tipo)
                    @if ($projetil<>mb_strtolower($tipo))
                        <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
                        </option>
                    @endif
                @endforeach
            </select>
        @endif
    </div>
