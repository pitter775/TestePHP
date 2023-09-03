<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoGrupo extends Model
{
    use HasFactory;

    protected $table = 'produto_grupo'; 
    protected $primaryKey = 'id_produto_grupo'; 

    // Um grupo de produtos pode ter vários produtos.
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_produto_grupo');
    }
}
