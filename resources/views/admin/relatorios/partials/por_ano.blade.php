    @foreach($total_por_anos as $ano)
        <tr>
            <th>{{ $ano['ano'] }}</th>
            <th>{{ $ano['quantidade'] }}</th>
        </tr>
    @endforeach