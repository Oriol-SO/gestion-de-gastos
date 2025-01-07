<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detalles')->insert([
            ['id' => 1, 'nombre' => 'PLANILLAS', 'insumo_id' => 1],
            ['id' => 2, 'nombre' => 'PENSION', 'insumo_id' => 1],
            ['id' => 3, 'nombre' => 'CUARTOS', 'insumo_id' => 1],
            ['id' => 4, 'nombre' => 'CAMAS , COLCHONES', 'insumo_id' => 1],
            ['id' => 5, 'nombre' => 'ESSALUD', 'insumo_id' => 1],
            ['id' => 6, 'nombre' => 'SINDICATO', 'insumo_id' => 1],
            ['id' => 7, 'nombre' => 'FONDO DE PENSIONES', 'insumo_id' => 1],
            ['id' => 8, 'nombre' => 'CONAFOVICER', 'insumo_id' => 1],
            ['id' => 9, 'nombre' => 'RENTA 4ta CARTEGORIA', 'insumo_id' => 1],
            ['id' => 10, 'nombre' => 'RENTA 5ta CARTEGORIA', 'insumo_id' => 1],

            ['id' => 11, 'nombre' => 'MOV TIERRAS', 'insumo_id' => 2],
            ['id' => 12, 'nombre' => 'PAVIMENTO', 'insumo_id' => 2],
            ['id' => 13, 'nombre' => 'VEREDAS', 'insumo_id' => 2],
            ['id' => 14, 'nombre' => 'CERRAJERIA', 'insumo_id' => 2],
            ['id' => 15, 'nombre' => 'PINTURA', 'insumo_id' => 2],
            ['id' => 16, 'nombre' => 'ENCOFRADOS', 'insumo_id' => 2],
            ['id' => 17, 'nombre' => 'ADOQUINES', 'insumo_id' => 2],

            ['id' => 18, 'nombre' => 'AFIRMADO', 'insumo_id' => 3],
            ['id' => 19, 'nombre' => 'ACERO', 'insumo_id' => 3],
            ['id' => 20, 'nombre' => 'AGREGADOS FINO', 'insumo_id' => 3],
            ['id' => 21, 'nombre' => 'AGREGADO GRUESO', 'insumo_id' => 3],
            ['id' => 22, 'nombre' => 'ADITIVOS', 'insumo_id' => 3],
            ['id' => 23, 'nombre' => 'APARATOS SANITARIOS', 'insumo_id' => 3],
            ['id' => 24, 'nombre' => 'ASFALTO', 'insumo_id' => 3],
            ['id' => 25, 'nombre' => 'BLOQUES Y LADRILLOS', 'insumo_id' => 3],
            ['id' => 26, 'nombre' => 'CEMENTO', 'insumo_id' => 3],
            ['id' => 27, 'nombre' => 'CERAMICAS', 'insumo_id' => 3],
            ['id' => 28, 'nombre' => 'CERRAJERIA', 'insumo_id' => 3],
            ['id' => 29, 'nombre' => 'DETONANTE', 'insumo_id' => 3],
            ['id' => 30, 'nombre' => 'POSTE DE CONCRETO', 'insumo_id' => 3],
            ['id' => 31, 'nombre' => 'LOSETA', 'insumo_id' => 3],
            ['id' => 32, 'nombre' => 'ELECTRICOS', 'insumo_id' => 3],
            ['id' => 33, 'nombre' => 'GASFITERIA_A', 'insumo_id' => 3],
            ['id' => 34, 'nombre' => 'GASFITERIA_D', 'insumo_id' => 3],
            ['id' => 35, 'nombre' => 'TUBOS PVC', 'insumo_id' => 3],
            ['id' => 36, 'nombre' => 'MADERA', 'insumo_id' => 3],
            ['id' => 37, 'nombre' => 'PINTURA', 'insumo_id' => 3],
            ['id' => 38, 'nombre' => 'CAJA DE AGUA', 'insumo_id' => 3],
            ['id' => 39, 'nombre' => 'GRASA', 'insumo_id' => 3],
            ['id' => 40, 'nombre' => 'GEOMEMBRANA', 'insumo_id' => 3],
            ['id' => 41, 'nombre' => 'TAPAS DE CONCRETO', 'insumo_id' => 3],
            ['id' => 42, 'nombre' => 'ORNAMENTALES', 'insumo_id' => 3],
            ['id' => 43, 'nombre' => 'POLIMEROS', 'insumo_id' => 3],
            ['id' => 44, 'nombre' => 'CONCRETO PREMEZCLADO', 'insumo_id' => 3],
            ['id' => 45, 'nombre' => 'FLETE', 'insumo_id' => 3],
            ['id' => 46, 'nombre' => 'HERRAMIENTAS', 'insumo_id' => 3],

            ['id' => 47, 'nombre' => 'EQUIPOS PESADOS', 'insumo_id' => 4],
            ['id' => 48, 'nombre' => 'EQUIPOS LIVIANOS', 'insumo_id' => 4],
            ['id' => 49, 'nombre' => 'PETROLEO', 'insumo_id' => 4],
            ['id' => 50, 'nombre' => 'GASOLINA', 'insumo_id' => 4],
            ['id' => 51, 'nombre' => 'TOPOGRAFIA', 'insumo_id' => 4],
            ['id' => 52, 'nombre' => 'MOVILIZACION/DESMOVILIZACION', 'insumo_id' => 4],

            ['id' => 53, 'nombre' => 'SERVICIOS', 'insumo_id' => 5],
            ['id' => 54, 'nombre' => 'PAGO PERSONAL', 'insumo_id' => 5],
            ['id' => 55, 'nombre' => 'GASTOS DE ESTADIA', 'insumo_id' => 5],
            ['id' => 56, 'nombre' => 'EQUIPOS DE SEGURIDAD', 'insumo_id' => 5],
            ['id' => 57, 'nombre' => 'UTILES DE ESCRITORIO', 'insumo_id' => 5],
            ['id' => 58, 'nombre' => 'HERRAMIENTAS DE OFICINA', 'insumo_id' => 5],
            ['id' => 59, 'nombre' => 'CAMIONETA', 'insumo_id' => 5],
            ['id' => 60, 'nombre' => 'GASTOS DE VISITA OBRA', 'insumo_id' => 5],
            ['id' => 61, 'nombre' => 'PRIMAS DE FIANZA', 'insumo_id' => 5],
            ['id' => 62, 'nombre' => 'SENCICO', 'insumo_id' => 5],
            ['id' => 63, 'nombre' => 'ITF', 'insumo_id' => 5],
            ['id' => 64, 'nombre' => 'SCTR', 'insumo_id' => 5],
            ['id' => 65, 'nombre' => 'VIDA LEY', 'insumo_id' => 5],
            ['id' => 66, 'nombre' => 'POLIZA CAR', 'insumo_id' => 5],
            ['id' => 67, 'nombre' => 'LIQUIDACION DE OBRA', 'insumo_id' => 5],
            ['id' => 68, 'nombre' => 'GASTOS DE LICITACION', 'insumo_id' => 5],
            ['id' => 69, 'nombre' => 'LABORATORIOS Y ESTUDIOS', 'insumo_id' => 5],
            ['id' => 70, 'nombre' => 'PM ARQUEOLOGICO', 'insumo_id' => 5],
            ['id' => 71, 'nombre' => 'ALQUILER LOCAL', 'insumo_id' => 5],
            ['id' => 72, 'nombre' => 'REHUBICACION DE POSTES', 'insumo_id' => 5],
            ['id' => 73, 'nombre' => 'DERECHO DE EXTRACCION', 'insumo_id' => 5],
            ['id' => 74, 'nombre' => 'DERECHO DE AGUA', 'insumo_id' => 5],
            ['id' => 75, 'nombre' => 'DONACIONES', 'insumo_id' => 5],
            ['id' => 76, 'nombre' => 'EXPEDIENTE ADICIONAL', 'insumo_id' => 5],

            ['id' => 77, 'nombre' => 'E.P. INDIVIDUAL', 'insumo_id' => 6],
            ['id' => 78, 'nombre' => 'E.P. COLECTIVA', 'insumo_id' => 6],
            ['id' => 79, 'nombre' => 'SEÑALIZACION DE SEGURIDAD', 'insumo_id' => 6],
            ['id' => 80, 'nombre' => 'EMERGENCIA EN SEGURIDAD', 'insumo_id' => 6],
            ['id' => 81, 'nombre' => 'CAPACITACION EN SEGURIDAD', 'insumo_id' => 6],

            ['id' => 82, 'nombre' => 'PLAN DE MANEJO AMBIENTAL', 'insumo_id' => 7],
            ['id' => 83, 'nombre' => 'RESIDUOS SOLIDOS', 'insumo_id' => 7],
            ['id' => 84, 'nombre' => 'MONITOREO DE AIRE Y RUIDO', 'insumo_id' => 7],
            ['id' => 85, 'nombre' => 'MONITOREO DE AGUA', 'insumo_id' => 7],
        ]);
    }
}
