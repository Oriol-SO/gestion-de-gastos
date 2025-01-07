<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaccionTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaccion_tipos')->insert([
            ['id' => 1, 'nombre' => 'DEPOSITO'],
            ['id' => 2, 'nombre' => 'EFECTIVO'],
            ['id' => 3, 'nombre' => 'TRANSFERENCIA'],
        ]);
    }
}
