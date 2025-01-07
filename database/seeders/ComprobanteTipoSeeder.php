<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprobanteTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comprobante_tipos')->insert([
            ['id' => 1, 'nombre' => 'FACTURA'],
            ['id' => 2, 'nombre' => 'RETIRO CREDITO'],
            ['id' => 3, 'nombre' => 'BOLETAS VENTA'],
            ['id' => 4, 'nombre' => 'DJ'],
            ['id' => 5, 'nombre' => 'RECIBO'],
            ['id' => 6, 'nombre' => 'TRANS. E/CUENTAS'],
            ['id' => 7, 'nombre' => 'COMISION BANCO'],
            ['id' => 8, 'nombre' => 'PRESTAMO'],
            ['id' => 9, 'nombre' => 'LIQUI. DE COMPRA'],
            ['id' => 10, 'nombre' => 'BOLETAS PLANILLA'],
            ['id' => 11, 'nombre' => 'ESTADO DE CUENTA'],
            ['id' => 12, 'nombre' => 'RH'],
            ['id' => 13, 'nombre' => 'SENCICO'],
            ['id' => 14, 'nombre' => 'CONAFOVICER'],
            ['id' => 15, 'nombre' => 'SUNAT'],
            ['id' => 16, 'nombre' => 'DEVOLUCIONES'],
        ]);
    }
}
