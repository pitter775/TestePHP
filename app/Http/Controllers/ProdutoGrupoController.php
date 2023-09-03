<?php

namespace App\Http\Controllers;

use App\Models\ProdutoGrupo;
use Illuminate\Http\Request;

class ProdutoGrupoController extends Controller
{
    public function index(Request $request)
    {
        $ordenarPorVendas = $request->get('ordenarPorVendas') == 'true';
        $agosto2023 = $request->get('agosto2023') == 'true';

        // Busca e prepara os dados
        $gruposComVendas = $this->buscarGruposComVendas($agosto2023);

        // Ordena os grupos se necessário
        if ($ordenarPorVendas) {
            $gruposComVendas = $this->ordenarGruposPorVendas($gruposComVendas);
        }

        // Filtra os 5 grupos com maiores vendas em agosto de 2023, se necessário
        if ($agosto2023) {
            $gruposComVendas = $gruposComVendas->sortByDesc('total_vendas')->take(5);
        }

        return view('produtos_grupos', compact('gruposComVendas'));
    }

    private function buscarGruposComVendas($agosto2023)
    {
        return ProdutoGrupo::with(['produtos.pedidoItems' => function ($query) use ($agosto2023) {
            if ($agosto2023) {
                $query->whereHas('pedido', function ($query) {
                    $query->whereBetween('dt_pedido', ['2023-08-01', '2023-08-31']);
                });
            }
        }])->get()->each(function ($grupo) {
            $this->calcularTotalVendas($grupo);
        });
    }

    private function calcularTotalVendas($grupo)
    {
        $total_vendas = 0;
        foreach ($grupo->produtos as $produto) {
            foreach ($produto->pedidoItems as $pedidoItem) {
                $total_vendas += $pedidoItem->qt_produto * $produto->vl_venda;
            }
        }
        $grupo->total_vendas = $total_vendas;
    }

    private function ordenarGruposPorVendas($gruposComVendas)
    {
        return $gruposComVendas->sortByDesc('total_vendas');
    }
}

