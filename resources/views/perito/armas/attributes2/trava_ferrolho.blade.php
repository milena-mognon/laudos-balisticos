<div class="col-lg-3">
    <div class="form-group">
        <label>Trava do Ferrolho</label>
        <select class="js-single form-control{{ $errors->has('trava_ferrolho') ? ' is-invalid' : '' }}" name="trava_ferrolho">
            @foreach (['Ambidestro', 'Lado Direito', 'Lado Esquerdo', 'Não se Aplica'] as $trava_ferrolho)
                <option value="{{ mb_strtolower($trava_ferrolho)}}" {{ (mb_strtolower($trava_ferrolho) == mb_strtolower($trava_ferrolho2)) ? 'selected=selected' : '' }}>
                    {{$trava_ferrolho}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'trava_ferrolho'])
    </div>
</div>