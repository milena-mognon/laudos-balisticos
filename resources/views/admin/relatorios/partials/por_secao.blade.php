{{--@extends('admin.relatorios.shared.table')--}}
@section('table_content')
    @foreach($total_por_secao as $secao)
        <tr>
            <th>{{ $secao['nome'] }}</th>
            <th>{{ $secao['quantidade'] }}</th>
        </tr>
    @endforeach
@endsection