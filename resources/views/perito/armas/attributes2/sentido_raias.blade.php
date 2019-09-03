<div class="col-lg-3">
    <div class="form-group" id="sentido_raias">
        <label>Sentido das Raias</label>
        <select class="js-single form-control{{ $errors->has('sentido_raias') ? ' is-invalid' : '' }}" name="sentido_raias">
            @foreach (['Dextrógiro', 'Sinistrógero', 'Danificado'] as $sentido_raias)
                <option value="{{ mb_strtolower($sentido_raias)}}" {{ (mb_strtolower($sentido_raias) == mb_strtolower($sentido_raias2)) ? 'selected=selected' : '' }}>
                    {{$sentido_raias}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'sentido_raias'])
    </div>
</div>
