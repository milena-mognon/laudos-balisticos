<div class="col-lg-3">
    <div class="form-group">
        <label for="calibre_id">Calibre Nominal</label>
        <select class="js-single-calibres form-control{{ $errors->has('calibre_id') ? ' is-invalid' : '' }}"
                name="calibre_id">
            <option></option>
            @foreach ($calibres as $calibre)
                <option value="{{ $calibre->id }}" {{ $calibre->id == $calibre2 ? 'selected=selected' : '' }}>
                    {{$calibre->nome}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'calibre_id'])
    </div>
</div>