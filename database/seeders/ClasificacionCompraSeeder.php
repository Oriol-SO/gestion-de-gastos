<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificacionCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clasificacion_compras')->insert([
            //para maquinaria liviana
            ['id' => 1, 'nombre' => 'RODILLO CHUPETERO', 'clasificacion_id' => 11],
            ['id' => 2, 'nombre' => 'MEZCLADORA', 'clasificacion_id' => 11],
            ['id' => 3, 'nombre' => 'CANGURO APISONADOR', 'clasificacion_id' => 11],
            ['id' => 4, 'nombre' => 'PLANCHA COMPACTADORA', 'clasificacion_id' => 11],
            ['id' => 5, 'nombre' => 'ROTOMARTILLO', 'clasificacion_id' => 11],
            ['id' => 6, 'nombre' => 'AMOLADORA', 'clasificacion_id' => 11],
            ['id' => 7, 'nombre' => 'SIERRA CIRCULAR', 'clasificacion_id' => 11],
            ['id' => 8, 'nombre' => 'DEMOLEDOR', 'clasificacion_id' => 11],
            ['id' => 9, 'nombre' => 'NIVEL DE INGENIERO', 'clasificacion_id' => 11],
            ['id' => 10, 'nombre' => 'EQUIPOS TOPOGRAFICOS', 'clasificacion_id' => 11],
            ['id' => 11, 'nombre' => 'MOTOBOMBA', 'clasificacion_id' => 11],
            ['id' => 12, 'nombre' => 'CORTADORA DE CONCRETO', 'clasificacion_id' => 11],
            ['id' => 13, 'nombre' => 'COMPRESORA', 'clasificacion_id' => 11],
            ['id' => 14, 'nombre' => 'GENERADOR', 'clasificacion_id' => 11],
            ['id' => 15, 'nombre' => 'MOTOCARGA', 'clasificacion_id' => 11], 
        ]);
    }
}
