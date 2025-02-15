<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vagas')->insert([
            [
                'id' => 1,
                'nome' => 'Desenvolvedor Backend',
                'cargo' => 'Júnior',
                'contato' => 'desenvolvimento@techsolutions.com',
                'formacao' => 'Engenharia de Software',
                'cnpj' => '12345678000199',
                'descricao' => 'Desenvolvedor Backend para sistemas de alta performance',
                'aprovado' => true,
                'ramo' => 'Tecnologia',
            ],
            [
                'id' => 2,
                'nome' => 'Gerente de Projetos',
                'cargo' => 'Pleno',
                'contato' => 'gerente@techsolutions.com',
                'formacao' => 'Administração',
                'cnpj' => '12345678000199',
                'descricao' => 'Responsável pela coordenação de projetos de tecnologia',
                'aprovado' => true,
                'ramo' => 'Tecnologia',
            ],
            [
                'id' => 3,
                'nome' => 'Arquiteto de Software',
                'cargo' => 'Sênior',
                'contato' => 'arquitetura@techsolutions.com',
                'formacao' => 'Ciência da Computação',
                'cnpj' => '12345678000199',
                'descricao' => 'Responsável pela arquitetura de sistemas',
                'aprovado' => true,
                'ramo' => 'Tecnologia',
            ],
            [
                'id' => 4,
                'nome' => 'Analista de Dados',
                'cargo' => 'Júnior',
                'contato' => 'dados@techsolutions.com',
                'formacao' => 'Matemática',
                'cnpj' => '12345678000199',
                'descricao' => 'Análise de dados para gerar insights de negócio',
                'aprovado' => true,
                'ramo' => 'Tecnologia',
            ],
            [
                'id' => 5,
                'nome' => 'Desenvolvedor Frontend',
                'cargo' => 'Pleno',
                'contato' => 'frontend@techsolutions.com',
                'formacao' => 'Design de Interfaces',
                'cnpj' => '12345678000199',
                'descricao' => 'Desenvolvedor para interface de usuário de aplicativos web',
                'aprovado' => true,
                'ramo' => 'Tecnologia',
            ],
            [
                'id' => 6,
                'nome' => 'Engenheiro Civil',
                'cargo' => 'Sênior',
                'contato' => 'engenheiro@construtoraalpha.com',
                'formacao' => 'Engenharia Civil',
                'cnpj' => '98765432000188',
                'descricao' => 'Responsável pela construção e planejamento de obras',
                'aprovado' => true,
                'ramo' => 'Construção Civil',
            ],
            [
                'id' => 7,
                'nome' => 'Pedreiro',
                'cargo' => 'Júnior',
                'contato' => 'pedreiro@construtoraalpha.com',
                'formacao' => 'Técnico em Construção Civil',
                'cnpj' => '98765432000188',
                'descricao' => 'Execução de obras de alvenaria e infraestrutura',
                'aprovado' => true,
                'ramo' => 'Construção Civil',
            ],
            [
                'id' => 8,
                'nome' => 'Eletricista',
                'cargo' => 'Pleno',
                'contato' => 'eletricista@construtoraalpha.com',
                'formacao' => 'Técnico em Eletromecânica',
                'cnpj' => '98765432000188',
                'descricao' => 'Instalações elétricas em obras de grande porte',
                'aprovado' => true,
                'ramo' => 'Construção Civil',
            ],
            [
                'id' => 9,
                'nome' => 'Auxiliar de Engenharia',
                'cargo' => 'Júnior',
                'contato' => 'auxiliar@construtoraalpha.com',
                'formacao' => 'Técnico em Engenharia',
                'cnpj' => '98765432000188',
                'descricao' => 'Apoio à equipe de engenheiros em obras e projetos',
                'aprovado' => true,
                'ramo' => 'Construção Civil',
            ],
            [
                'id' => 10,
                'nome' => 'Supervisor de Obras',
                'cargo' => 'Sênior',
                'contato' => 'supervisor@construtoraalpha.com',
                'formacao' => 'Engenharia Civil',
                'cnpj' => '98765432000188',
                'descricao' => 'Coordenação das equipes em canteiro de obras',
                'aprovado' => true,
                'ramo' => 'Construção Civil',
            ],
        ]);
    }
}
