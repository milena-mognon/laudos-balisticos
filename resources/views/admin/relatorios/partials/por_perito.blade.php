@component('admin.relatorios.shared.table')
    @slot('colspan')
        4
    @endslot
    @slot('table_title')
        Total de Laudos Realizados por Perito(a)
    @endslot
    <tr style="background-color: #d3d3d3;">
        <th colspan="2">Perito(a)</th>
        <th colspan="2">Total de Laudos</th>
    </tr>
    </thead>
    <tbody align="center">
    @foreach($total_por_perito as $perito)
        <tr>
            <th colspan="2">{{ $perito['nome'] }}</th>
            <th colspan="2">{{ $perito['quantidade'] }}</th>
        </tr>
    @endforeach
    </tbody>
@endcomponent