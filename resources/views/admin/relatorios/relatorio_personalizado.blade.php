<h1 align="center">Relatório</h1>

<h3>Lista dos Laudos Realizados</h3>
<p>Período entre {{ $data_inicial }} e {{ $data_final }}</p>

@component('admin.relatorios.shared.table')
    @slot('colspan')
        5
    @endslot
    @slot('table_title')
        Relatório - Todos os laudos
    @endslot
    <tr style="background-color: #d3d3d3;">
        <th>Laudo (REP)</th>
        <th>Ofício</th>
        <th>Data de Criação</th>
        <th>Perito</th>
        <th>Seção</th>
    </tr>
    </thead>
    <tbody align="center">
    @foreach($laudos as $laudo)
        <tr>
            <th>{{ $laudo->rep }}</th>
            <th>{{ $laudo->oficio }}</th>
            <th>{{ formatar_data_do_bd($laudo->created_at) }}</th>
            <th>{{ $laudo->perito->nome }}</th>
            <th>{{ $laudo->secao->nome }}</th>

        </tr>
    @endforeach
    </tbody>
@endcomponent

