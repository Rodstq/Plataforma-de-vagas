<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscricao')->insert([
            [
                'id' => 1,
                'cpf' => '12345678901',
                'vagaid' => 1,
                'datainscricao' => Carbon::create(2025, 2, 10, 22, 49, 27),
            ],
            [
                'id' => 2,
                'cpf' => '23456789012',
                'vagaid' => 2,
                'datainscricao' => Carbon::create(2025, 2, 10, 22, 49, 27),
            ],
            [
                'id' => 3,
                'cpf' => '34567890123',
                'vagaid' => 3,
                'datainscricao' => Carbon::create(2025, 2, 10, 22, 49, 27),
            ],
            [
                'id' => 4,
                'cpf' => '45678901234',
                'vagaid' => 4,
                'datainscricao' => Carbon::create(2025, 2, 10, 22, 49, 27),
            ],
            [
                'id' => 5,
                'cpf' => '56789012345',
                'vagaid' => 5,
                'datainscricao' => Carbon::create(2025, 2, 10, 22, 49, 27),
            ],
        ]);
    }
}
