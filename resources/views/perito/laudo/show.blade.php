@extends('layout.card')
@section('card-name', 'Visão Geral do Laudo')
@section('card-content')
    <div class="row">
        <div class="col-lg-4" id="imagem">
        </div>
        <input type="hidden" value="{{$rep->id}}" id="laudo_id" name="laudo_id">
        <div class="col-lg-4">
            @include('util.input', [
              'acao' => 'show',
              'label_campo' => "Nº REP: ",
              'tipo_input' => "text",
              'nome_campo' => "rep",
              'value' => "$rep->rep",
              'id' => "rep" // id do campo
            ])

            @include('util.input', [
              'acao' => 'show',
                'label_campo' => "Data da Solicitação: ",
                'tipo_input' => "text",
                'nome_campo' => "data_solicitacao",
                'value' => date('d/m/Y', strtotime($rep->data_solicitacao)),
                'id' => "calendario" // id do campo
                ])
            @include('util.input', [
                'acao' => 'show',
                  'label_campo' => "Data da Designação: ",
                  'tipo_input' => "text",
                  'nome_campo' => "data_designacao",
                  'value' => date('d/m/Y', strtotime($rep->data_designacao)),
                  'id' => "calendario2" // id do campo
              ])
            @include('util.input', [
                'acao' => 'show',
                  'label_campo' => "Nº do Ofício: ", // Label do HTML
                  'tipo_input' => "text", // Tipo do Input
                  'nome_campo' => "oficio", // nome do campo (igual no BD)
                  'value' => "$rep->oficio", // Valor que deve aparecer no campo
                  'id' => "oficio" // id do campo
              ])

        </div>
        <div class="col-lg-4">
            @include('util.select', [
                'acao' => 'show',
                'opcoes' => $secoes,
                  'label_campo' => "Seção: ",
                  'nome_campo' => "secao_id",
                  'value' => "$rep->secao_id",
                  'campo' => "$rep->secao",
                  'id' => "secao_id" // id do campo
                  ])
            @include('util.select', [
                'acao' => 'show',
                'opcoes' => $cidades,
                  'label_campo' => "Cidade Solicitante: ",
                  'nome_campo' => "cidade_id",
                  'value' => "$rep->cidade_id",
                  'campo' => "$rep->cidade",
                  'id' => "cidade_id" // id do campo
                  ])
            @include('util.select', [
              'acao' => 'show',
              'opcoes' => $delegacias,
                'label_campo' => "Delegacia Solicitante",
                'nome_campo' => "delegacia_id",
                'value' => "$rep->delegacia_id",
                'campo' => "$rep->delegacia",
                'id' => "delegacia_id" // id do campo
                ])
            <input type="hidden" class="form-control" value="{{ $rep->perito_id}}"
                   name="perito_id" disabled="true">

            @include('util.select', [
              'acao' => 'show',
                'label_campo' => "Diretor",
              'opcoes' => $diretores,
                'nome_campo' => "diretor_id",
                'value' => "$rep->diretor_id",
                'campo' => "$diretor->nome",
                'id' => "diretor_id" // id do campo
                ])

            <br>
            <button type="submit" id="edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</button>
            <button type="submit" id="salvar" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                Salvar
            </button>
        </div>

        <div class="col-lg-12">
            <h3>Material Periciado: </h3>
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
                    @if (count($armas) > 0)
                        @foreach ($armas as $arma)

                            <tr value="{{ $arma->id }}" name="armaId">
                                <td> {{ mb_strtoupper($arma->tipo_arma) }} </td> {{--tipo arma retorna null--}}
                                <td> {{ $arma->marca }} </td>
                                <td> {{ $arma->calibre }} </td>
                                <td></td>
                                <td> {{ $arma->num_serie }} </td>
                                <td> {{ $arma->num_lacre }} </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ url("arma/$arma->id/edit") }}"> <i
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
                    @if (count($municoes) > 0)
                        @foreach ($municoes as $municao)

                            <tr value="{{ $municao->id }}" name="municaoId">
                                <td> {{ mb_strtoupper($municao->tipo) }} </td>
                                <td> {{ $municao->marca }} </td>
                                <td> {{ $municao->calibre }} </td>
                                <td> {{ $municao->quantidade }} (Unidades)</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url("municao/$municao->id/edit") }}"> <i
                                                class="fa fa-pencil"></i> Editar</a>
                                </td>
                                <td>
                                    <button value="{{ $municao->id }}" type="submit"
                                            class="btn btn-danger deleteMunicao">
                                        <i class="fa fa-trash"></i> Deletar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @if (count($componentes) > 0)
                        @foreach ($componentes as $componente)

                            <tr value="{{ $componente->id }}" name="componenteId" style="align: center;">
                                <td> {{ mb_strtoupper($componente->conteudo) }} </td>
                                <td></td>
                                <td></td>
                                <td> {{ $componente->quantidade }}
                                    (@if(mb_strtoupper($componente->conteudo)=="ESPOLETAS") Unidades ) @else Gramas
                                    ) @endif </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ url("componente/$componente->id/edit") }}"> <i class="fa fa-pencil"></i>
                                        Editar</a>
                                </td>
                                <td>
                                    <button value="{{ $componente->id }}" type="submit"
                                            class="btn btn-danger deleteComponente"><i class="fa fa-trash"></i> Deletar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

            <a class="btn btn-success" href="{{ url("materiais/$rep->id") }}"><i class="fa fa-plus"
                                                                                 aria-hidden="true"></i>
                Adicionar Material</a>
            <a class="btn btn-primary" id="gerar" href="{{ route('gerarDoc.create', [$rep->id]) }}"><i
                        class="fa fa-download" aria-hidden="true"></i> Gerar Laudo</a>
        </div>
    </div>
@endsection
