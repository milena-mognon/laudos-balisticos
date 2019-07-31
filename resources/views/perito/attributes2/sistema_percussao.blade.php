<div class="col-lg-3">
    <div class="form-group">
        <label>Sistema de Percussão</label>
        <select class="form-control" name="sistema_percussao">
            @foreach (['Direta', 'Indireta'] as $sistema_percussao)
                <option value="{{ mb_strtolower($sistema_percussao)}}" {{ (mb_strtolower($sistema_percussao) == mb_strtolower($sistema_percussao2)) ? 'selected=selected' : '' }}>
                    {{$sistema_percussao}}
                </option>
            @endforeach
        </select>
    </div>
</div>
