{{--@extends('admin.relatorios.shared.table')--}}
    @foreach($total_por_perito as $perito)
        <tr>
            <th>{{ $perito['nome'] }}</th>
            <th>{{ $perito['quantidade'] }}</th>
        </tr>
    @endforeach


