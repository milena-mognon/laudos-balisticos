<div class="col-lg-3">
    <div class="form-group">
        <label>Projétil (carga de projeção)</label>
        <select class="js-single-select form-control{{ $errors->has('projetil') ? ' is-invalid' : '' }}"
                name="projetil" id="projetil">
            <option value=""></option>
            @foreach (['Balins de Chumbo', 'Balote'] as $projetil)
                <option value="{{ mb_strtolower($projetil)}}" {{ (mb_strtolower($projetil) == mb_strtolower($projetil2)) ? 'selected=selected' : '' }}>
                    {{$projetil}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'projetil'])
    </div>
</div>