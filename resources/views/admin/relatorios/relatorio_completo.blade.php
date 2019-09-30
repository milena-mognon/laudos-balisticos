<h1 align="center">Relatório Completo</h1>

@include('admin.relatorios.partials.por_ano')
@include('admin.relatorios.partials.por_perito')
@include('admin.relatorios.partials.por_secao')
<hr>
<div>
    <h3 >Total de Laudos Gerados pelo Sistema</h3>
    <h4>{{ $total }}</h4>
</div>


