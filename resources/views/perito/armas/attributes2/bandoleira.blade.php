<div class="col-lg-3">
    <div class="form-group">
        <label>Bandoleira</label>
        <select class="js-single form-control{{ $errors->has('bandoleira') ? ' is-invalid' : '' }}" name="bandoleira">
            @foreach ([''] as $bandoleira)
                <option value="{{ mb_strtolower($bandoleira)}}" {{ (mb_strtolower($bandoleira) == mb_strtolower($bandoleira2)) ? 'selected=selected' : '' }}>
                    {{$bandoleira}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'bandoleira'])
    </div>
</div>