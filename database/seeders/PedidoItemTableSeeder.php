<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedido_item')->insert([
            ['id_pedido_item' => 1, 'qt_produto' => 1, 'id_produto' => 1, 'id_pedido' => 1],
            ['id_pedido_item' => 2, 'qt_produto' => 2, 'id_produto' => 3, 'id_pedido' => 1],
            ['id_pedido_item' => 3, 'qt_produto' => 2, 'id_produto' => 2, 'id_pedido' => 2],
            ['id_pedido_item' => 4, 'qt_produto' => 1, 'id_produto' => 2, 'id_pedido' => 2],
            ['id_pedido_item' => 5, 'qt_produto' => 1, 'id_produto' => 3, 'id_pedido' => 3],            
            ['id_pedido_item' => 6, 'qt_produto' => 1, 'id_produto' => 1, 'id_pedido' => 4],            
            ['id_pedido_item' => 7, 'qt_produto' => 1, 'id_produto' => 4, 'id_pedido' => 4],            
        ]);
    }
}
