<div class="col-lg-3">
    <div class="form-group">
        <label>Bandoleira</label>
        <select class="js-single-select form-control{{ $errors->has('bandoleira') ? ' is-invalid' : '' }}" name="bandoleira">
            <option value=""></option>
            @foreach (['Não Possui', 'Couro', 'Cordelete', 'Nylon'] as $bandoleira)
                <option value="{{ mb_strtolower($bandoleira)}}" {{ (mb_strtolower($bandoleira) == mb_strtolower($bandoleira2)) ? 'selected=selected' : '' }}>
                    {{$bandoleira}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'bandoleira'])
    </div>
</div>