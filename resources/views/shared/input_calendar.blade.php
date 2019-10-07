<div class="col-lg-{{ $size ?? "8" }}">
    @if(!empty($label))
        <label for="{{ $name }}" class="col-form-label">{{ $label . ' *' ?? ''}}</label>
    @endif
    @if(!empty($label2))
        <label for="{{ $name }}" class="col-form-label">{{ $label2 ?? ''}}</label>
    @endif
    <input class="form-control calendario {{ $errors->has($name) ? ' is-invalid' : '' }}"
           type="text" id="{{ $id ?? $name }}" name="{{ $name }}"
           autocomplete="off" value="{{old($name) ?? $value}}" placeholder="__/__/____"/>
    @include('shared.error_feedback', ['name' => $name])
</div>