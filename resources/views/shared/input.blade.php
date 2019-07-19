<div class="col-lg-{{ $size ?? "8" }}">
    @if(!empty($label))
        <label for="{{ $name }}" class="col-form-label">{{ $label ?? ''}}</label>
    @endif
    <input id="{{ $id ?? $name }}" type="{{ $type ?? 'text' }}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{ $name }}" value="{{ empty($value) ? old($name) : old($name, $value)}}">

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>