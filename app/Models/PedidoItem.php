<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $table = 'pedido_item'; 
    protected $primaryKey = 'id_pedido_item'; 

    // Um item de pedido pertence a um pedido.
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    // Um item de pedido pertence a um produto.
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}
