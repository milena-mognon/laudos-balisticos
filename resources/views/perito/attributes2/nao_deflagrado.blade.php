<div class="col-lg-3 mt-4" id="div_nao_deflagrado">
    <div class="form-group">
        <div class="custom-control custom-checkbox mr-sm-2">
            @if($nao_deflagrado)
                <input type="checkbox" class="custom-control-input" name="nao_deflagrado"
                       id="nao_deflagrado" checked>
            @else
                <input type="checkbox" class="custom-control-input" name="nao_deflagrado"
                       id="nao_deflagrado">
            @endif
            <label class="custom-control-label" for="nao_deflagrado">Percutido e Não Deflagrado</label>
        </div>
    </div>
</div>