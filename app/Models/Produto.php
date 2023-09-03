<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto'; 
    protected $primaryKey = 'id_produto'; 
    protected $fillable = ['nm_produto', 'vl_compra', 'vl_venda', 'id_produto_grupo'];

    // Um produto pertence a um grupo de produtos.
    public function produtoGrupo()
    {
        return $this->belongsTo(ProdutoGrupo::class, 'id_produto_grupo');
    }

    public function pedidoItems() {
        return $this->hasMany(PedidoItem::class, 'id_produto');
    }
    
}
