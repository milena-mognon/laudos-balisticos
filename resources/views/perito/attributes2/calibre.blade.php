<div class="col-lg-3">
    <div class="form-group">
        <label for="calibre_id">Calibre Nominal</label>
        <select class="form-control{{ $errors->has('calibre_id') ? ' is-invalid' : '' }}" name="calibre_id">
            @foreach ($calibres as $calibre)
                <option value="{{ $calibre->id }}" {{ $calibre->id == $calibre2 ? 'selected=selected' : '' }}>
                    {{$calibre->nome}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'calibre'])
    </div>
</div>