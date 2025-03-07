<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuenta_tipos')->insert([
            ['id' => 1, 'nombre' => 'BCP RODCON'],
            ['id' => 2, 'nombre' => 'BCP RODCON DOLARES'],
            ['id' => 3, 'nombre' => 'NACION LABOON'],
            ['id' => 4, 'nombre' => 'SCOTIABANK RODCON'],
            ['id' => 5, 'nombre' => 'NACION CIEL'],
            ['id' => 6, 'nombre' => 'PICHINCHA CIEL'],
            ['id' => 7, 'nombre' => 'BCP CIEL'],
            ['id' => 8, 'nombre' => 'BCP ANDY'],
            ['id' => 9, 'nombre' => 'INTERBANK NATY'],
            ['id' => 10, 'nombre' => 'BCP NATY'],
            ['id' => 11, 'nombre' => 'BANBIF SOLES CIEL'],
            ['id' => 12, 'nombre' => 'BANBIF DOLARES CIEL'],
            ['id' => 13, 'nombre' => 'BCP CIEL LOGISTICA'],
            ['id' => 14, 'nombre' => 'SCOTIABANK CIEL'],
            ['id' => 15, 'nombre' => 'BBVA CIEL'],
            ['id' => 16, 'nombre' => 'BBVA RODCON'],
            ['id' => 17, 'nombre' => 'BCP CIEL DOLARES'],
            ['id' => 18, 'nombre' => 'CAJA CHICA'],
            ['id' => 19, 'nombre' => 'NACION RODCON'],
            ['id' => 20, 'nombre' => 'BANBIF SANNY'],
            ['id' => 21, 'nombre' => 'BBVA SANNY'],
            ['id' => 22, 'nombre' => 'BBVA ECOHIDRO'],
            ['id' => 23, 'nombre' => 'BBVA CASABEN'],
            ['id' => 24, 'nombre' => 'BBVA LABOON'],
            ['id' => 25, 'nombre' => 'BANBIF LABOON'],
            ['id' => 26, 'nombre' => 'BANBIF DOLARES RODCON'],
            ['id' => 27, 'nombre' => 'BANBIF SOLES RODCON'],
            ['id' => 28, 'nombre' => 'NACION CASABEN'],
            ['id' => 29, 'nombre' => 'NACION ECOHIDRO'],
            ['id' => 30, 'nombre' => 'BBVA TURPA'],
            ['id' => 31, 'nombre' => 'BBVA SALCAHUASI'],
            ['id' => 32, 'nombre' => 'BBVA HIDROSOL'],
        ]);
    }
}
