<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cliente')->insert([
            ['id_cliente'=> 1, 'nm_cliente' => 'Juliana Martins', 'dt_nascimento' => '2010-01-01'],
            ['id_cliente'=> 2, 'nm_cliente' => 'João Silva', 'dt_nascimento' => '2000-01-01'],
            ['id_cliente'=> 3, 'nm_cliente' => 'Pedro Oliveira', 'dt_nascimento' => '1990-01-01'],
            ['id_cliente'=> 4,'nm_cliente' => 'Caio Barbosa','dt_nascimento' => '1970-01-01',],
            ['id_cliente'=> 5,'nm_cliente' =>'Aline Ferreira','dt_nascimento' => '1960-01-01',],
            ['id_cliente'=> 6,'nm_cliente' => 'Lucas Almeida','dt_nascimento' => '1950-01-01',],
            ['id_cliente'=> 7,'nm_cliente' => 'Mariana Silva','dt_nascimento' => '1910-01-01',],
            ['id_cliente'=> 8,'nm_cliente' => 'Rafael Sampaio','dt_nascimento' => '1900-01-01',],
            ['id_cliente'=> 9,'nm_cliente' => 'Gabriela Lima','dt_nascimento' => '1890-01-01',],
            ['id_cliente'=> 10,'nm_cliente' => 'Rodrigo Pereira','dt_nascimento' => '1880-01-01',],            
        ]);
    }
}
