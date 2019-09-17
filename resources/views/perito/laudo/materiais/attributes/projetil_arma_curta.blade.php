<div class="col-lg-3">
    <div class="form-group">
        <label>Projétil (formato)</label>
        <select class="js-single-select form-control{{ $errors->has('projetil') ? ' is-invalid' : '' }}"
                name="projetil" id="projetil">
            <option value=""></option>
            @foreach (['Ponta Ogival','Ponta Plana', 'Ponta Oca' ,'Canto-vivo ','Semi canto-vivo'] as $projetil)
                <option value="{{ mb_strtolower($projetil)}}" {{ (mb_strtolower($projetil) == mb_strtolower($projetil2)) ? 'selected=selected' : '' }}>
                    {{$projetil}}
                </option>
            @endforeach
        </select>
        @include('shared.error_feedback', ['name' => 'projetil'])
    </div>
</div>