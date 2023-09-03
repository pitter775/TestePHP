@extends('layouts.master')
@section('title', 'Dias com mais Vendas')

@section('content')


<div class="container mt-5">
    <h1>Dias com mais vendas em 2023</h1>

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>Data</th>
                <th>Total de Vendas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $date => $total_vendas)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</td>
                    <td>{{ 'R$ ' . number_format($total_vendas, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
