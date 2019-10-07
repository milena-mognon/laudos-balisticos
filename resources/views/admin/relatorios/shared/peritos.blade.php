<div class="col-lg-{{ $size ?? "12" }} mt-2">
    <label class="filtro_span" for="perito_id">
        Peritos <span>(Selecione até 5 peritos)</span>
    </label>
    <select class="js-multiple-limit form-control {{ $errors->has('perito_id') ? ' is-invalid' : '' }}"
        name="peritos_ids[]" multiple="multiple">
        @foreach($peritos as $perito)
            <option value="{{ $perito->id }}">
                {{$perito->nome}}
            </option>
        @endforeach
        </select>
    @include('shared.error_feedback', ['name' => 'perito_id'])
</div>
    