<div class="col-lg-3">
    <div class="form-group">
        <label>Nº de Série</label>
        <select class="form-control" name="tipo_serie" id="tipo_serie">
            @foreach (
            ['Não Aparente', 'Adulterado', 'Ilegível', 'Legível',
            'Suprimido Intencionalmente', 'Regravado', 'Revelado'] as $tipo_serie)
                <option value="{{ mb_strtolower($tipo_serie)}}" {{ (mb_strtolower($tipo_serie) == mb_strtolower($tipo_serie2)) ? 'selected=selected' : '' }}>
                    {{$tipo_serie}}
                </option>
            @endforeach
        </select>
    </div>
</div>
{{--</div>--}}
<div class="col-lg-3">
    <div class="form-group">
        <label for="num_serie"></label>
        <input type="text" class="form-control" name="num_serie" id="num_serie" placeholder="Digite o Número de Série"
               value="{{ old('num_serie', $num_serie) }}" disabled>
    </div>
</div>