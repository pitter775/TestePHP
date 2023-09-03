<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoGrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produto_grupo')->insert([
            ['id_produto_grupo' => 1, 'nm_produto_grupo' => 'Planos de Saúde'],
            ['id_produto_grupo' => 2, 'nm_produto_grupo' => 'Seguros'],
            ['id_produto_grupo' => 3, 'nm_produto_grupo' => 'Vales']
        ]);
    }
}
