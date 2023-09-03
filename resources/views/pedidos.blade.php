@extends('layouts.master')

@section('title', 'Pedidos')

@section('content')

<div class="container mt-5">
    <h1>Listagem de Pedidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Data do Pedido</th>
                <th>Cliente</th>
                <th>Itens do Pedido</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id_pedido }}</td>
                <td>{{ \Carbon\Carbon::parse($pedido->dt_pedido)->format('d/m/Y') }}</td>
                <td>{{ $pedido->cliente->nm_cliente }}</td>
                <td>
                    @foreach($pedido->pedidoItems as $item)
                        <div id="item-{{ $item->id_pedido_item }}">
                            <strong>Produto:</strong> {{ $item->produto->nm_produto }} <br>
                            <strong>Quantidade:</strong> {{ $item->qt_produto }} <br>
                            <button onclick="deleteItem({{ $item->id_pedido_item }})" class="btn btn-danger btn-sm">Excluir Item</button>
                            <hr>
                        </div>
                    @endforeach
                </td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function deleteItem(itemID) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `/pedido-item/${itemID}`,
            type: 'DELETE',
            success: function(result) {
            if (result.success) {
                $(`#item-${itemID}`).remove();
            }
        }
        });
    }
</script>

@endsection
