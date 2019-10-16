@component('layout.modal')
    @slot('modal_id')
        solicitante-modal
    @endslot
    @slot('modal_title')
        Cadastrar Órgão Solicitante
    @endslot
    <div class="form-group">
        <label>Órgão Solicitante: *</label>
        <input class="form-control"
               type="text" id="nome_solicitante" name="nome"
               autocomplete="off"/>
    </div>
    <div class="form-group">
        <label for="cidade_id2">Cidade</label>
        <select class="js-cidade-modal form-control" name="cidade_id2" 
            id="cidade2" style="width: 100%">
            <option></option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}">
                    {{$cidade->nome}}
                </option>
            @endforeach
        </select>
    </div>
    <p>* Obrigatório</p>
    <button type="button" class="btn btn-primary" id="cadastro_solicitante">Cadastrar</button>
@endcomponent