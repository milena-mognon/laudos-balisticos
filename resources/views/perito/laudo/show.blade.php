@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Visão Geral do Laudo</h4>
    </div>
    <hr>
    <div class="col-lg-12">
        <input type="hidden" value="{{$laudo->id}}" id="laudo_id" name="laudo_id">
        <div class="form-group row">
            @include('shared.input', ['name' => 'rep', 'label' => 'REP', 'size' => '3', 'value' => $laudo->rep])
            @include('shared.input', ['name' => 'oficio', 'label' => 'Ofício', 'size' => '3', 'value' => $laudo->oficio])
            @include('shared.input', ['name' => 'inquerito' , 'label' => 'Inquerito Policial', 'size' => '3', 'value' => $laudo->inquerito])
            @include('shared.select_with_id', ['name' => 'secao_id', 'label' => 'Seção', 'dados' => $secoes, 'value' => $laudo->secao_id, 'size' => '3'])
        </div>
        <div class="form-group row">
            @include('shared.input_calendar', ['name' => 'data_solicitacao' , 'label' => 'Data da Solicitação', 'size' => '3', 'value' => formatar_data_do_bd($laudo->data_solicitacao)])
            @include('shared.input_calendar', ['name' => 'data_designacao', 'label' => 'Data da Designação', 'size' => '3', 'value' => formatar_data_do_bd($laudo->data_designacao)])
            @include('shared.input', ['name' => 'indiciado', 'label' => 'Indiciado', 'size' => '3', 'value' => $laudo->indiciado])
        </div>
        <div class="form-group row">
            {{--<input class="form-control" type="hidden" name="perito_id" autocomplete="off"--}}
            {{--value="{{ Auth::id() }}"/>--}}

            @include('shared.select_with_id', ['name' => 'cidade_id', 'label' => 'Cidade', 'dados' => $cidades, 'value' => $laudo->cidade_id, 'size' => '3'])
            @include('shared.select_with_id', ['name' => 'solicitante_id', 'label' => 'Órgão Solicitante', 'dados' => $solicitantes,
                         'value' => $laudo->solicitante_id, 'size' => '3'])
            @include('shared.select_with_id', ['name' => 'diretor_id', 'label' => 'Diretor', 'dados' => $diretores, 'size' => '3', 'value' => $laudo->diretor->id])
            <div class="col-lg-3 mt-auto">
                <button type="submit" id="edit" class="btn btn-primary mt-2">
                    <i class="far fa-edit"></i> Editar
                </button>
                <button type="submit" id="salvar" class="btn btn-primary mt-2">
                    <i class="far fa-save" aria-hidden="true"></i>
                    Salvar
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-12">
        <h4 class="mb-4">Material Periciado: </h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tabela_pecas">
                <thead align="center">
                <tr>
                    <th>Material</th>
                    <th>Marca</th>
                    <th>Calibre</th>
                    <th>Quantidade</th>
                    <th>Nº de Série</th>
                    <th>Nº do Lacre</th>
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody align="center">
                @includeWhen(count($armas) > 0, 'perito.laudo.partials.arma')

                </tbody>
                {{--@includeWhen(count($municoes) > 0, 'perito.laudo.partials.municao', ['municoes' => $municoes])--}}
                {{--@includeWhen(count($componentes) > 0, 'perito.laudo.partials.componente', ['componentes' => $componentes])--}}
            </table>
        </div>

        <a class="btn btn-success" href="{{ route('laudos.materiais', $laudo )}}">
            <i class="fas fa-plus" aria-hidden="true"></i>
            Adicionar Material
        </a>
        <a class="btn btn-primary" href="{{ route('laudos.docx', $laudo )}}">
            <i class="fas fa-file-download" aria-hidden="true"></i>
            Gerar Docx
        </a>
        {{--<a class="btn btn-danger" href="{{ route('laudos.pdf', $laudo )}}">--}}
        {{--<i class="fas fa-file-pdf" aria-hidden="true"></i>--}}
        {{--Gerar PDF--}}
        {{--</a>--}}
    </div>
{{--    @include('perito.modals.upload')--}}
@endsection
