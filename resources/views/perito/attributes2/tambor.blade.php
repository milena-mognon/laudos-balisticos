<div class="col-lg-3">
    <div class="form-group">
        <label>Tambor Rebate para:</label>
        <select class="js-single form-control{{ $errors->has('tambor_rebate') ? ' is-invalid' : '' }}"
                name="tambor_rebate">
            @foreach (['Esquerda', 'Direita'] as $tambor_rebate)
                <option value="{{ mb_strtolower($tambor_rebate)}}" {{ (mb_strtolower($tambor_rebate) == mb_strtolower($tambor_rebate2)) ? 'selected=selected' : '' }}>
                    {{$tambor_rebate}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'tambor_rebate'])
    </div>
</div>
