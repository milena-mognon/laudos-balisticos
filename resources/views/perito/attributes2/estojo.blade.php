<div class="col-lg-3">
    <div class="form-group">
        <label>Estojo</label>
        <select class="js-single-select form-control{{ $errors->has('estojo') ? ' is-invalid' : '' }}"
                name="estojo" id="estojo">
            <option value=""></option>
            @foreach (['Metálico', 'Plástico com Culote Metálico' ,'Papelão com Culote Metálico'] as $estojo)
                <option value="{{ mb_strtolower($estojo)}}" {{ (mb_strtolower($estojo) == mb_strtolower($estojo2)) ? 'selected=selected' : '' }}>
                    {{$estojo}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'estojo'])
    </div>
</div>