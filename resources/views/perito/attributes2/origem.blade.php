<div class="col-lg-3">
    <div class="form-group">
        <label>País de Origem</label>
        <select class="form-control" name="origem_id">
            @foreach ($origens as $origem)
                <option value="{{ $origem->id }}" {{ $origem->id == $origem2 ? 'selected=selected' : '' }}>
                    {{$origem->nome}}
                </option>
            @endforeach
            {{--<option value="outroPais">Outro(cadastrar)</option>--}}
        </select>
    </div>
</div>