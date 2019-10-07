@component('admin.relatorios.shared.table')
    @slot('colspan')
        4
    @endslot
    @slot('table_title')
        Total de Laudos Realizados por Seção
    @endslot
    <tr style="background-color: #d3d3d3;">
        <th colspan="2">Seção</th>
        <th colspan="2">Total de Laudos</th>
    </tr>
    </thead>
    <tbody align="center">
    @foreach($total_por_secao as $secao)
        <tr>
            <th colspan="2">{{ $secao['nome'] }}</th>
            <th colspan="2">{{ $secao['quantidade'] }}</th>
        </tr>
    @endforeach
    </tbody>
    </table>
    </div>
@endcomponent
        