@component('admin.relatorios.shared.table')
@slot('table_title') 
    Total de Laudos Realizados por Ano
@endslot
    <tr style="background-color: #d3d3d3;">
        <th colspan="2">Ano</th>
        <th colspan="2">Total de Laudos</th>
    </tr>
    </thead>
    <tbody align="center">
    @foreach($total_por_anos as $ano)
        <tr>
            <th colspan="2">{{ $ano['ano'] }}</th>
            <th colspan="2">{{ $ano['quantidade'] }}</th>
        </tr>
    @endforeach
    </tbody>
@endcomponent
        