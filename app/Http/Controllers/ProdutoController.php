<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; 
use App\Models\PedidoItem; 
use App\Models\ProdutoGrupo; 

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('produtoGrupo')->get();
        $produtoGrupos = ProdutoGrupo::all(); 
    
        return view('produtos', compact('produtos', 'produtoGrupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_produto' => 'required',
            'vl_compra' => 'required',
            'vl_venda' => 'required',
            'id_produto_grupo' => 'required'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $pedidoItem = PedidoItem::where('id_produto', $produto->id_produto)->first();
    
        if ($pedidoItem) {
            return redirect()->route('produtos.index')
                ->with('error', 'Não é possível excluir o produto pois ele está em um pedido.');
        }
    
        $produto->delete();
    
        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso.');
    }
}
