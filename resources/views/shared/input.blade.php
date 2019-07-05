<div class="col-lg-{{ $size ?? "8" }}">
    <lsbe for="{{$name}}">{{ $label ?? '' }}</lsbe>
    <input id="{{ $id ?? $name }}" type="{{ $type ?? 'text' }}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{ $name }}" value="{{ empty($value) ? old($name) : old($name, $value)}}">

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>