<div class="col-lg-3">
    <div class="form-group">
        <label>Trava de Gatilho *</label>
        <select class="js-single form-control{{ $errors->has('trava_gatilho') ? ' is-invalid' : '' }}" name="trava_gatilho">
            @foreach (['Ambidestro', 'Lado Direito', 'Lado Esquerdo', 'Não se Aplica'] as $trava_gatilho)
                <option value="{{ mb_strtolower($trava_gatilho)}}" {{ (mb_strtolower($trava_gatilho) == mb_strtolower($trava_gatilho2)) ? 'selected=selected' : '' }}>
                    {{$trava_gatilho}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'trava_gatilho'])
    </div>
</div>