<div class="col-lg-{{ $size ?? "3" }} mt-2">
    <label for="oficio">Ofício *</label>
    <input class="form-control{{ $errors->has('oficio') ? ' is-invalid' : '' }}"
           name="oficio" autocomplete="off" type="text"
           value="{{ old('oficio', $oficio) }}" required/>
    @include('shared.error_feedback', ['name' => 'oficio'])
</div>