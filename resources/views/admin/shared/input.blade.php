<div class="col-md-8">
    <input id="{{ $id }}" type="{{ $type }}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{ $name }}" value="{{ empty($value) ? old($name) : old($name, $value)}}">

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>