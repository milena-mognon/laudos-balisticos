<div class="col-lg-{{ $size ?? "6" }} mt-2">
    <label for="indiciado">Indiciado</label>
    <input class="form-control{{ $errors->has('indiciado') ? ' is-invalid' : '' }}"
           name="indiciado" autocomplete="off" type="text"
           value="{{ old('indiciado', $indiciado) }}" required/>
    @include('shared.error_feedback', ['name' => 'indiciado'])
</div>