<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produto')->insert([
            ['id_produto' => 1, 'nm_produto' => 'Seguro de Vida', 'vl_compra' => 300.00, 'vl_venda' => 400.00, 'id_produto_grupo' => 2],
            ['id_produto' => 2, 'nm_produto' => 'Vale-Alimentação', 'vl_compra' => 250.00, 'vl_venda' => 270.00, 'id_produto_grupo' => 3],
            ['id_produto' => 3, 'nm_produto' => 'Vale-Gasolina', 'vl_compra' => 350.00, 'vl_venda' => 420.00, 'id_produto_grupo' => 3],
            ['id_produto' => 4, 'nm_produto' => 'Plano GOLD saude', 'vl_compra' => 550.00, 'vl_venda' => 620.00, 'id_produto_grupo' => 1]
        ]);
    }
}
