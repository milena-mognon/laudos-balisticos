<div class="col-lg-3">
    <div class="form-group">
        <label>Cão</label>
        <select class="js-single-select form-control{{ $errors->has('cao') ? ' is-invalid' : '' }}" name="cao">
            <option value=""></option>
            @foreach (['Exposto', 'Mecanismo Embutido'] as $cao)
                <option value="{{ mb_strtolower($cao)}}" {{ (mb_strtolower($cao) == mb_strtolower($cao2)) ? 'selected=selected' : '' }}>
                    {{$cao}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'cao'])
    </div>
</div>