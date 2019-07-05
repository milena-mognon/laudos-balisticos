<div class="form-group">
    <label>Nº de Série</label>
    @if($acao == 'cadastrar')
        <select class="form-control" name="tipo_serie" id="tipo_serie">
            @foreach (['Não Aparente', 'Adulterado', 'Ilegível', 'Legível', 'Suprimido Intencionalmente', 'Regravado', 'Revelado'] as $num_serie)
                <option id="{{ mb_strtolower($num_serie) }}" value="{{ mb_strtolower($num_serie) }}">{{ $num_serie }}
                </option>
            @endforeach
        </select>
    @endif
    @if($acao == 'atualizar')
        <select class="form-control" name="tipo_serie" id="tipo_serie">
            <option id="{{ mb_strtolower($num_serie) }}"
                    value="{{ mb_strtolower($num_serie) }}">{{ ucfirst ($num_serie) }}
                {{-- ucfirst() -> deixa somente a primeira letra maiuscula--}}
            </option>
            @foreach (['Não Aparente', 'Adulterado', 'Ilegível', 'Legível', 'Suprimido Intencionalmente', 'Regravado', 'Revelado'] as $tipo)
                @if ($num_serie<>mb_strtolower($tipo))
                    <option id="{{ mb_strtolower($tipo) }}" value="{{ mb_strtolower($tipo) }}">{{ $tipo }}
                    </option>
                @endif
            @endforeach
        </select>
    @endif
</div>
</div>
<div class="col-lg-3">
 <div class="form-group">
        <label for="num_serie"></label>
        <input type="text" class="form-control" name="num_serie" id="num_serie" placeholder="Digite o Número de Série"
               disabled>
    </div>
