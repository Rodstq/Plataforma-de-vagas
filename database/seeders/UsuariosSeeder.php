<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'cpf' => '12345678901',
                'nome' => 'Ana Silva',
                'telefone' => '11987654321',
                'formacao' => 'Engenharia de Software',
                'tipousuario' => 'comum',
            ],
            [
                'cpf' => '23456789012',
                'nome' => 'Carlos Pereira',
                'telefone' => '21987654322',
                'formacao' => 'Administração',
                'tipousuario' => 'comum',
            ],
            [
                'cpf' => '34567890123',
                'nome' => 'Mariana Souza',
                'telefone' => '31987654323',
                'formacao' => 'Direito',
                'tipousuario' => 'comum',
            ],
            [
                'cpf' => '45678901234',
                'nome' => 'Ricardo Alves',
                'telefone' => '41987654324',
                'formacao' => 'Medicina',
                'tipousuario' => 'admin',
            ],
            [
                'cpf' => '56789012345',
                'nome' => 'Fernanda Lima',
                'telefone' => '51987654325',
                'formacao' => 'Ciência da Computação',
                'tipousuario' => 'comum',
            ],
            [
                'cpf' => '77777777885',
                'nome' => 'Jon Dee',
                'telefone' => '11111111111',
                'formacao' => 'Pedreiro Sênior Ágil',
                'tipousuario' => 'comum',
            ],
            [
                'cpf' => '45789451231',
                'nome' => 'Alesis',
                'telefone' => '12457894521',
                'formacao' => 'Pedreiro Full Stack',
                'tipousuario' => 'comum',
            ],
        ]);
    }
}
