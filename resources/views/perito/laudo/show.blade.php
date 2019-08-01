@extends('layout.component')
@section('page')
    <div class="col-8">
        <h4>Visão Geral do Laudo</h4>
    </div>
    <hr>
    <div class="col-lg-12">
        <input type="hidden" value="{{$rep->id}}" id="laudo_id" name="laudo_id">
        <div class="form-group row">
            @include('shared.input', ['name' => 'rep', 'label' => 'REP', 'size' => '3', 'value' => $rep->rep])
            @include('shared.input', ['name' => 'oficio', 'label' => 'Ofício', 'size' => '3', 'value' => $rep->oficio])
            @include('shared.input', ['name' => 'inquerito' , 'label' => 'Inquerito Policial', 'size' => '3', 'value' => $rep->inquerito])
            @include('shared.select_with_id', ['name' => 'secao_id', 'label' => 'Seção', 'dados' => $secoes, 'value' => $rep->secao_id, 'size' => '3'])
        </div>
        <div class="form-group row">
            @include('shared.input_calendar', ['name' => 'data_solicitacao' , 'label' => 'Data da Solicitação', 'size' => '3', 'value' => formatar_data_do_bd($rep->data_solicitacao)])
            @include('shared.input_calendar', ['name' => 'data_designacao', 'label' => 'Data da Designação', 'size' => '3', 'value' => formatar_data_do_bd($rep->data_designacao)])
            @include('shared.input', ['name' => 'indiciado', 'label' => 'Indiciado', 'size' => '3', 'value' => $rep->indiciado])
        </div>
        <div class="form-group row">
            <input class="form-control" type="hidden" name="perito_id" autocomplete="off"
                   value="{{ Auth::id() }}"/>

            @include('shared.select_with_id', ['name' => 'cidade_id', 'label' => 'Cidade', 'dados' => $cidades, 'value' => $rep->cidade_id, 'size' => '3'])
            @include('shared.select_with_id', ['name' => 'solicitante_id', 'label' => 'Órgão Solicitante', 'dados' => $solicitantes,
                         'value' => $rep->solicitante_id, 'size' => '3'])
            @include('shared.select_with_id', ['name' => 'diretor_id', 'label' => 'Diretor', 'dados' => $diretores, 'size' => '3', 'value' => $rep->diretor->id])
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
        <div class="col-lg-8 mb-4">
            <h4>Material Periciado: </h4>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tabela_pecas">
                <thead align="center">
                <tr>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Calibre</th>
                    <th>Quantidade</th>
                    <th>Nº de Série</th>
                    <th>Nº do Lacre</th>
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody align="center">
                </tbody>

                @if (count($armas) > 0)
                    @foreach ($armas as $arma)

                        <tr value="{{ $arma->id }}" name="armaId" align="center">
                            <td> {{ mb_strtoupper($arma->tipo_arma) }} </td>
                            <td> {{ $arma->marca->nome }} </td>
                            <td> {{ $arma->calibre->nome }} </td>
                            <td></td>
                            <td> {{ $arma->num_serie }} </td>
                            <td> {{ $arma->num_lacre }} </td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('armas.edit', [$rep->id, $arma]) }}"> <i
                                            class="fa fa-pencil"></i> Editar</a>
                            </td>
                            <td>
                                <button value="{{ $arma->id }}" type="submit" class="btn btn-danger deleteArma">
                                    <i class="fa fa-trash"></i>
                                    Deletar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                {{--@if (count($municoes) > 0)--}}
                {{--@foreach ($municoes as $municao)--}}

                {{--<tr value="{{ $municao->id }}" name="municaoId">--}}
                {{--<td> {{ mb_strtoupper($municao->tipo) }} </td>--}}
                {{--<td> {{ $municao->marca }} </td>--}}
                {{--<td> {{ $municao->calibre }} </td>--}}
                {{--<td> {{ $municao->quantidade }} (Unidades)</td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td>--}}
                {{--<a class="btn btn-primary" href="{{ url("municao/$municao->id/edit") }}"> <i--}}
                {{--class="fa fa-pencil"></i> Editar</a>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<button value="{{ $municao->id }}" type="submit"--}}
                {{--class="btn btn-danger deleteMunicao">--}}
                {{--<i class="fa fa-trash"></i> Deletar--}}
                {{--</button>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--@endforeach--}}
                {{--@endif--}}
                {{--@if (count($componentes) > 0)--}}
                {{--@foreach ($componentes as $componente)--}}

                {{--<tr value="{{ $componente->id }}" name="componenteId" style="align: center;">--}}
                {{--<td> {{ mb_strtoupper($componente->conteudo) }} </td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td> {{ $componente->quantidade }}--}}
                {{--(@if(mb_strtoupper($componente->conteudo)=="ESPOLETAS") Unidades ) @else Gramas--}}
                {{--) @endif </td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td>--}}
                {{--<a class="btn btn-primary"--}}
                {{--href="{{ url("componente/$componente->id/edit") }}"> <i class="fa fa-pencil"></i>--}}
                {{--Editar</a>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<button value="{{ $componente->id }}" type="submit"--}}
                {{--class="btn btn-danger deleteComponente"><i class="fa fa-trash"></i> Deletar--}}
                {{--</button>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--@endforeach--}}
                {{--@endif--}}

            </table>
        </div>

        <a class="btn btn-success" href="{{ route('laudos.materiais', $rep->id )}}">
            <i class="fas fa-plus" aria-hidden="true"></i>
            Adicionar Material
        </a>
        <a class="btn btn-primary" href="{{ route('laudos.generate', $rep )}}">
            <i class="fas fa-file-download" aria-hidden="true"></i>
            Gerar Laudo
        </a>
    </div>
@endsection
