<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoGrupoController;
use App\Http\Controllers\DiasVendasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', ClienteController::class);

Route::get('clientes/atualizar-idosos', [ClienteController::class, 'atualizarIdosos'])->name('clientes.atualizarIdosos');
Route::resource('clientes', ClienteController::class);

Route::resource('produtos', ProdutoController::class);
Route::resource('produtos-grupos', ProdutoGrupoController::class);

Route::resource('pedidos', PedidoController::class);
Route::delete('pedido-item/{pedidoItem}', [PedidoController::class, 'destroyItem']);

Route::get('dias-venda', [DiasVendasController::class, 'diasComMaiorVenda'])->name('dias-venda');


