<div class="col-lg-{{ $size ?? "12" }} mt-2">
    <label for="email">Email *</label>
    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" autocomplete="off"
        type="text" value="{{ old('email', $email) }}" required />
    @include('shared.error_feedback', ['name' => 'email'])
</div>