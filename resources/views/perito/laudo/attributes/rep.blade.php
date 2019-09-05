<div class="col-lg-{{ $size ?? "3" }} mt-2">
    <label for="rep">Rep (xxxxx/2019) *</label>
    <input class="form-control {{ $errors->has('rep') ? ' is-invalid' : '' }}"
           name="rep" autocomplete="off" type="text"
           value="{{ old('rep', $rep) }}" required/>
    @include('shared.error_feedback', ['name' => 'rep'])
</div>