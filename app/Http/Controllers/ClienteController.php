<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Cliente;
 

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all(); 
        return view('clientes', compact('clientes'));
    }

    public function atualizarIdosos()
    {
        $setentaAnosAtras = Carbon::now()->subYears(70);
        $clientesIdosos = Cliente::where('dt_nascimento', '<=', $setentaAnosAtras)->get();

        foreach ($clientesIdosos as $cliente) {
         //   if (!Str::endsWith($cliente->nm_cliente, ' IDOSO')) {
                // $cliente->nm_cliente = $cliente->nm_cliente . ' IDOSO';
                $cliente->nm_cliente = 'IDOSO';
                $cliente->save();
         //   }
        }

        return redirect()->route('clientes.index')->with('success', 'Clientes atualizados com sucesso.');
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->pedidos()->count() > 0) {
            return redirect()->route('clientes.index')
                ->with('error', 'O cliente possui pedidos relacionados e não pode ser excluído.');
        } else {
            $cliente->delete();
            return redirect()->route('clientes.index')
                ->with('success', 'Cliente excluído com sucesso.');
        }
    }
}
