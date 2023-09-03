<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido; 
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['pedidoItems.produto', 'cliente'])->get();
        return view('pedidos', compact('pedidos'));
    }
    public function destroyItem(PedidoItem $pedidoItem)
    {
      
        $pedidoId = $pedidoItem->id_pedido;
        
        $pedidoItem->delete();
        if (PedidoItem::where('id_pedido', $pedidoId)->count() == 0) {
            Pedido::find($pedidoId)->delete();
        }
        return response()->json(['success' => 'Item excluído com sucesso.']);
    }
    public function destroy(Pedido $pedido)
    {
        // Deleta todos os itens associados a esse pedido
        PedidoItem::where('id_pedido', $pedido->id_pedido)->delete();

        // deleta o pedido
        $pedido->delete();
        return redirect()->route('pedidos.index')
                        ->with('success', 'Pedido e seus itens foram excluídos com sucesso.');
    }
}
