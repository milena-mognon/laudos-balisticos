@if($cal!="Espingarda")
<div class="form-group" id="tipo_projetil">
        <label>Projétil (tipo)</label>
        @if($acao == 'cadastrar' && $cal == 'Comum')
            <select class="form-control" name="tipo_projetil" id="tipo_projetil">
                @foreach (['Encamisado', 'Semi-encamisado', 'Chumbo nu'] as $tipo_projetil)
                    <option id="{{ mb_strtolower($tipo_projetil) }}" value="{{ mb_strtolower($tipo_projetil) }}">{{ $tipo_projetil }}
                    </option>
                @endforeach
            </select>
        @endif

        @if($acao == 'atualizar' && $cal == 'Comum')
            <select class="form-control" name="tipo_projetil" id="tipo_projetil">
                <option  id="{{ mb_strtolower($tipo_projetil) }}" value="{{ mb_strtolower($tipo_projetil) }}">{{ ucfirst ($tipo_projetil) }}
                                    {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
                </option>
                @foreach (['Encamisado', 'Semi-encamisado', 'Chumbo nu'] as $tipo)
                    @if ($tipo_projetil<>mb_strtolower($tipo))
                        <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
                        </option>
                    @endif
                @endforeach
            </select>
        @endif
    </div>
@endif
