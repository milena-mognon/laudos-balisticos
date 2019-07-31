<div class="col-lg-3">
    <div class="form-group">
        <label>Calibre Nominal</label>
        <select class="form-control" name="calibre_id">
            @foreach ($calibres as $calibre)
                <option value="{{ $calibre->id }}" {{ $calibre->id == $calibre2 ? 'selected=selected' : '' }}>
                    {{$calibre->nome}}
                </option>
            @endforeach
        </select>
    </div>
</div>