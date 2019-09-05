<div class="col-lg-{{ $size ?? "3" }} mt-2">
    <label for="inquerito">Inquerito</label>
    <input class="form-control{{ $errors->has('inquerito') ? ' is-invalid' : '' }}"
           name="inquerito" autocomplete="off" type="text"
           value="{{ old('inquerito', $inquerito) }}" maxlength="20"/>
    @include('shared.error_feedback', ['name' => 'inquerito'])
</div>