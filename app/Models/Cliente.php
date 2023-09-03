<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente'; 
    protected $primaryKey = 'id_cliente'; 

    // Um cliente pode ter vários pedidos.
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
