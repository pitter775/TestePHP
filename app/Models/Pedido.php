<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido'; 
    protected $primaryKey = 'id_pedido'; 
    protected $dates = ['dt_pedido'];

    // Um pedido pertence a um cliente.
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Um pedido pode ter vários itens.
    public function pedidoItems()
    {
        return $this->hasMany(PedidoItem::class, 'id_pedido');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }    
}
