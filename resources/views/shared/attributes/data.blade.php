<div class="col-lg-{{ $size ?? "12" }}">
    @if(!empty($label))
    <label for="{{ $name }}" class="col-form-label">{{ $label ?? ''}}</label>
    @endif
    <input class="form-control calendario {{ $errors->has($name) ? ' is-invalid' : '' }}" type="text" name="{{ $name }}"
        autocomplete="off" value="{{ old($name, formatar_data_do_bd($value)) }}" placeholder="__/__/____" />
    @include('shared.error_feedback', ['name' => $name])
</div>