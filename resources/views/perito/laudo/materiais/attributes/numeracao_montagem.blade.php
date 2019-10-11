<div class="col-lg-3">
    <div class="form-group">
        <label>Numeração de Montagem</label>
        <input class="form-control{{ $errors->has('numeracao_montagem') ? ' is-invalid' : '' }}" name="numeracao_montagem" autocomplete="off" type="text"
               value="{{ old('numeracao_montagem', $numeracao_montagem) }}"/>
        @include('shared.error_feedback', ['name' => 'numeracao_montagem'])
    </div>
</div>
