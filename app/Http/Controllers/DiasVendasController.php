<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class DiasVendasController extends Controller
{
    public function diasComMaiorVenda() {
        // particularmente eu preferia fazer diretamente na consulta mas como combinamos de usar o modo laraveriana...

        // Carregar todos os pedidos e seus itens de 2023
        $pedidos = Pedido::with(['pedidoItems.produto'])
            ->whereBetween('dt_pedido', ['2023-01-01', '2023-12-31'])
            ->get();
    
        $vendas = [];
    
        foreach ($pedidos as $pedido) {
 
            $date = \Carbon\Carbon::parse($pedido->dt_pedido)->format('Y-m-d');
            
            foreach ($pedido->pedidoItems as $pedidoItem) {
                if (!isset($vendas[$date])) {
                    $vendas[$date] = 0;
                }
                $vendas[$date] += $pedidoItem->qt_produto * $pedidoItem->produto->vl_venda;
            }
        }
    
        // Ordenar os dias por vendas em ordem decrescente
        arsort($vendas);
    
        return view('dias_venda', ['vendas' => $vendas]);
    }
}
