<div class="col-lg-{{ $size ?? "4" }} mt-2">
    <label for="solicitante_id">Órgão Solicitante *</label>
    <button type="button" class="btn-cadastro float-right" id="cadastrar_solicitante">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </button>
    <select class="form-control js-single-solicitante {{ $errors->has('solicitante_id') ? ' is-invalid' : '' }}"
        name="solicitante_id" id="solicitante_id">
        <option value=""></option>
        @foreach($solicitantes ?? [] as $solicitante)
        <option value="{{ $solicitante->id }}" {{ $solicitante->id == $solicitante2 ? 'selected=selected' : '' }}>
            {{$solicitante->nome}}
        </option>
        @endforeach
    </select>
    @include('shared.error_feedback', ['name' => 'solicitante_id'])
</div>