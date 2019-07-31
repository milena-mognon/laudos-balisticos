<div class="col-lg-3">
    <div class="form-group" id="funcionamento">
        <label>Funcionamento</label>
        <select class="form-control" name="funcionamento">
            @foreach (['Eficiente', 'Ineficiente'] as $funcionamento)
                <option value="{{ mb_strtolower($funcionamento)}}"
                        {{ (mb_strtolower($funcionamento) == mb_strtolower($funcionamento2)) ? 'selected=selected' : '' }}>
                    {{$funcionamento}}
                </option>
            @endforeach
        </select>
    </div>
</div>
