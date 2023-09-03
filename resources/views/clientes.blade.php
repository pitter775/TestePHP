@extends('layouts.master')
@section('title', 'Clientes')

@section('content')

<div class="container mt-5">
    <h1>Listagem de Clientes</h1>
    <a href="{{ route('clientes.atualizarIdosos') }}" class="btn btn-primary btn-sm">Atualizar todos os clientes com +70 anos para o nome "IDOSO"</a>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->nm_cliente }}</td>
                <td>{{ \Carbon\Carbon::parse($cliente->dt_nascimento)->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
</div>


@endsection