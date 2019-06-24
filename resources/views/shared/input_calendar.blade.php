<div class="col-lg-{{ $size ?? "8" }}">
    <input class="form-control calendario {{ $errors->has($name) ? ' is-invalid' : '' }}"
           type="text" id="{{ $id ?? $name }}" name="{{ $name }}"
           autocomplete="off" value="{{old($name)}}" placeholder="__/__/____"/>

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>