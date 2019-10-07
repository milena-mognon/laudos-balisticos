<div class="col-lg-{{ $size ?? "12" }} mt-3">
    <label class="filtro_span" for="secao_id">
        Seções <span> (Selecione até 5 seções)</span>
    </label>
    <select class="js-multiple-limit form-control {{ $errors->has('secao_id') ? ' is-invalid' : '' }}"
            name="secoes_ids[]" multiple="multiple">
        @foreach($secoes as $secao)
            <option value="{{ $secao->id }}">
                {{$secao->nome}}
            </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'secao_id'])
</div>
    