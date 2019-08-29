<div class="col-lg-3">
    <div class="form-group">
        <label>Sistema de Carregamento</label>
        <select class="js-single form-control{{ $errors->has('sistema_carregamento') ? ' is-invalid' : '' }}"
                name="sistema_carregamento" id="sistema_carregamento">
            @foreach (['Retro-carga', 'Antecarga'] as $sistema_carregamento)
                <option value="{{ mb_strtolower($sistema_carregamento)}}" {{ (mb_strtolower($sistema_carregamento) == mb_strtolower($sistema_carregamento2)) ? 'selected=selected' : '' }}>
                    {{$sistema_carregamento}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'sistema_carregamento'])
    </div>
</div>
