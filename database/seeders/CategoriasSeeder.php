<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'id' => 1,
                'nombre' => 'MAQUINARIA',
            ],
            [
                'id' => 2,
                'nombre' => 'OBRAS',
            ],
            [
                'id' => 3,
                'nombre' => 'CONSULTORIA EXP',
            ],
            [
                'id' => 4,
                'nombre' => 'CONSULTORIA SUPER',
            ],
            [
                'id' => 5,
                'nombre' => 'OFICINA',
            ],
            [
                'id' => 6,
                'nombre' => 'PRESTAMOS',
            ],
            [
                'id' => 7,
                'nombre' => 'UTILIDADES',
            ],
            [
                'id' => 8,
                'nombre' => 'BANCOS',
            ],
            [
                'id' => 9,
                'nombre' => 'SUNAT',
            ],
            [
                'id' => 10,
                'nombre' => 'INVERSIONES',
            ],
            [
                'id' => 11,
                'nombre' => 'CASA',
            ],
            [
                'id' => 12,
                'nombre' => 'DEVOLUCIONES',
            ],
        ]);
    }
}
