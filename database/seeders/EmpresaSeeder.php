<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresa')->insert([
            [
                'cnpj' => '12345678000199',
                'nome' => 'Tech Solutions LTDA',
                'telefone' => '11987654321',
                'ramo' => 'Tecnologia',
            ],
            [
                'cnpj' => '98765432000188',
                'nome' => 'Construtora Alpha',
                'telefone' => '21987654321',
                'ramo' => 'Construção Civil',
            ],
        ]);
    }
}
