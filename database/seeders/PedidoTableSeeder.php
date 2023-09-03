<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedido')->insert([
            ['id_pedido' => 1, 'dt_pedido' => '2023-08-01', 'id_cliente' => 1],
            ['id_pedido' => 2, 'dt_pedido' => '2023-08-02', 'id_cliente' => 2],
            ['id_pedido' => 3, 'dt_pedido' => '2023-09-02', 'id_cliente' => 3],
            ['id_pedido' => 4, 'dt_pedido' => '2023-08-02', 'id_cliente' => 4],
        ]);
    }
}
