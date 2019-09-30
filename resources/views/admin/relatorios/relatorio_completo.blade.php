<h1 align="center">Relatório Completo</h1>

<div style="width:600px; margin: 50px;">
    <table border=1 cellspacing=0 cellpadding=10 bordercolor="666633" width="100%">
        <thead align="center">
        <tr style="background-color: #bdbebd;">
            <th colspan="4">Total de Laudos Realizados Por Ano</th>
        </tr>

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
    </table>
</div>

<div style="width:600px; margin: 50px;" >
    <table border=1 cellspacing=0 cellpadding=10 bordercolor="666633" width="100%">
        <thead align="center">
        <tr style="background-color: #bdbebd;">
            <th colspan="4">Total de Laudos Realizados Por Perito(a)</th>
        </tr>

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
    </table>
</div>

<div style="width:600px; margin: 50px;">
    <table border=1 cellspacing=0 cellpadding=10 bordercolor="666633" width="100%">
        <thead align="center">
        <tr style="background-color: #bdbebd;">
            <th colspan="4">Total de Laudos Realizados Por Seção</th>
        </tr>

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

<hr>

<div>
    <h3 >Total de Laudos Gerados pelo Sistema</h3>

    <h4>{{ $total }}</h4>
</div>


