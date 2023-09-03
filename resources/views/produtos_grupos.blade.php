@extends('layouts.master')

@section('title', 'Grupos de Produtos')

@section('content')

<div class="container mt-5">
    <h1>Listagem de Grupos de Produtos</h1>
    
    <a href="{{ route('produtos-grupos.index', ['agosto2023' => 'true']) }}">
        Filtrar os Top 5 Gupos de Maiores Vendas em Agosto de 2023
    </a>
    
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID do Grupo</th>
                <th>Nome do Grupo</th>
                <th>Total de Vendas 
                    @if(request()->get('agosto2023') !== 'true')
                        <a href="{{ route('produtos-grupos.index', ['ordenarPorVendas' => 'true']) }}">↑</a>
                        <a href="{{ route('produtos-grupos.index', ['ordenarPorVendas' => 'false']) }}">↓</a>
                    @endif
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($gruposComVendas as $grupo)
            <tr>
                <td>{{ $grupo->id_produto_grupo }}</td>
                <td>{{ $grupo->nm_produto_grupo }}</td>
                <td>{{ 'R$ ' . number_format($grupo->total_vendas, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById("filtrar-agosto").addEventListener("click", function() {
        // Implemente aqui o código AJAX para acionar o filtro e atualizar a tabela
    });
</script>

@endsection
