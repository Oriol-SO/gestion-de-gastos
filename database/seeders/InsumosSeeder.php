<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insumos')->insert([
            //GASTO OBRAS
            ['id' => 1, 'nombre' => 'MANO DE OBRA', 'generica_id' => 11],
            ['id' => 2, 'nombre' => 'SUB CONTRATA', 'generica_id' => 11],
            ['id' => 3, 'nombre' => 'MATERIALES', 'generica_id' => 11],
            ['id' => 4, 'nombre' => 'EQUIPOS', 'generica_id' => 11],
            ['id' => 5, 'nombre' => 'GASTOS GENERALES', 'generica_id' => 11],
            ['id' => 6, 'nombre' => 'SEGURIDAD', 'generica_id' => 11],
            ['id' => 7, 'nombre' => 'MANEJO AMBIENTAL', 'generica_id' => 11],
            ['id' => 8, 'nombre' => 'CAJA CHICA O.', 'generica_id' => 11],

            //FACTURAS P PAGAR
            ['id' => 10, 'nombre' => 'CEMENTO', 'generica_id' => 14],
            ['id' => 11, 'nombre' => 'ACEROS', 'generica_id' => 14],
            ['id' => 12, 'nombre' => 'HERRAMIENTAS', 'generica_id' => 14],
            ['id' => 13, 'nombre' => 'EPPS', 'generica_id' => 14],
            ['id' => 14, 'nombre' => 'MAQUINARIA', 'generica_id' => 14],
            ['id' => 15, 'nombre' => 'MADERA', 'generica_id' => 14],
            ['id' => 16, 'nombre' => 'ASFALTO', 'generica_id' => 14],

            //FACTURAS A CREDITO 15,20,41
            ['id' => 18, 'nombre' => 'MANO DE OBRA', 'generica_id' => 15],
            ['id' => 19, 'nombre' => 'SUB CONTRATA', 'generica_id' => 15],
            ['id' => 20, 'nombre' => 'MATERIALES', 'generica_id' => 15],
            ['id' => 21, 'nombre' => 'EQUIPOS', 'generica_id' => 15],
            ['id' => 22, 'nombre' => 'GASTOS GENERALES', 'generica_id' => 15],
            ['id' => 23, 'nombre' => 'SEGURIDAD', 'generica_id' => 15],
            ['id' => 24, 'nombre' => 'MANEJO AMBIENTAL', 'generica_id' => 15],

            ['id' => 100, 'nombre' => 'MANO DE OBRA', 'generica_id' => 20],
            ['id' => 101, 'nombre' => 'SUB CONTRATA', 'generica_id' => 20],
            ['id' => 102, 'nombre' => 'MATERIALES', 'generica_id' => 20],
            ['id' => 103, 'nombre' => 'EQUIPOS', 'generica_id' => 20],
            ['id' => 104, 'nombre' => 'GASTOS GENERALES', 'generica_id' => 20],
            ['id' => 105, 'nombre' => 'SEGURIDAD', 'generica_id' => 20],
            ['id' => 106, 'nombre' => 'MANEJO AMBIENTAL', 'generica_id' => 20],

            ['id' => 107, 'nombre' => 'MANO DE OBRA', 'generica_id' => 41],
            ['id' => 108, 'nombre' => 'SUB CONTRATA', 'generica_id' => 41],
            ['id' => 109, 'nombre' => 'MATERIALES', 'generica_id' => 41],
            ['id' => 110, 'nombre' => 'EQUIPOS', 'generica_id' => 41],
            ['id' => 111, 'nombre' => 'GASTOS GENERALES', 'generica_id' => 41],
            ['id' => 112, 'nombre' => 'SEGURIDAD', 'generica_id' => 41],
            ['id' => 113, 'nombre' => 'MANEJO AMBIENTAL', 'generica_id' => 41],





           // IMPUESTOS 8,17,39,61,
            ['id' => 26, 'nombre' => 'IGV', 'generica_id' => 8],
            ['id' => 27, 'nombre' => 'RENTA', 'generica_id' => 8],
            ['id' => 28, 'nombre' => 'FACTURAS', 'generica_id' => 8],
            
            ['id' => 114, 'nombre' => 'IGV', 'generica_id' => 17],
            ['id' => 115, 'nombre' => 'RENTA', 'generica_id' => 17],
            ['id' => 116, 'nombre' => 'FACTURAS', 'generica_id' => 17],

            ['id' => 117, 'nombre' => 'IGV', 'generica_id' => 39],
            ['id' => 118, 'nombre' => 'RENTA', 'generica_id' => 39],
            ['id' => 119, 'nombre' => 'FACTURAS', 'generica_id' => 39],

            ['id' => 120, 'nombre' => 'IGV', 'generica_id' => 61],
            ['id' => 121, 'nombre' => 'RENTA', 'generica_id' => 61],
            ['id' => 122, 'nombre' => 'FACTURAS', 'generica_id' => 61],

           // PAGO DE VALORIZACIONES
            ['id' => 30, 'nombre' => 'PAGO DE VALORIZACION', 'generica_id' => 19],
            ['id' => 31, 'nombre' => 'INGRESO DETRACCION', 'generica_id' => 19],

           // PAGO PERSONAL 45,64
            ['id' => 33, 'nombre' => 'PLANILLA', 'generica_id' => 45],
            ['id' => 34, 'nombre' => 'RH', 'generica_id' => 45],
            ['id' => 35, 'nombre' => 'ESSALUD', 'generica_id' => 45],
            ['id' => 36, 'nombre' => 'FONDO DE PENSIONES', 'generica_id' => 45],
            ['id' => 37, 'nombre' => 'RENTA 4ta CARTEGORIA', 'generica_id' => 45],
            ['id' => 38, 'nombre' => 'RENTA 5ta CARTEGORIA', 'generica_id' => 45],
            ['id' => 39, 'nombre' => 'VIDA LEY', 'generica_id' => 45],
            ['id' => 40, 'nombre' => 'CTS', 'generica_id' => 45],
            ['id' => 41, 'nombre' => 'PENSION', 'generica_id' => 45],
           
            ['id' => 123, 'nombre' => 'PLANILLA', 'generica_id' => 64],
            ['id' => 124, 'nombre' => 'RH', 'generica_id' => 64],
            ['id' => 125, 'nombre' => 'ESSALUD', 'generica_id' => 64],
            ['id' => 126, 'nombre' => 'FONDO DE PENSIONES', 'generica_id' => 64],
            ['id' => 127, 'nombre' => 'RENTA 4ta CARTEGORIA', 'generica_id' => 64],
            ['id' => 128, 'nombre' => 'RENTA 5ta CARTEGORIA', 'generica_id' => 64],
            ['id' => 129, 'nombre' => 'VIDA LEY', 'generica_id' => 64],
            ['id' => 130, 'nombre' => 'CTS', 'generica_id' => 64],
            ['id' => 131, 'nombre' => 'PENSION', 'generica_id' => 64],

            //SERVICIOS 44,62

            ['id' => 132, 'nombre' => 'ALQUILER', 'generica_id' => 62],
            ['id' => 133, 'nombre' => 'INTERNET', 'generica_id' => 62],
            ['id' => 134, 'nombre' => 'TELEFONIA', 'generica_id' => 62],
            ['id' => 135, 'nombre' => 'AGUA', 'generica_id' => 62],
            ['id' => 136, 'nombre' => 'LUZ', 'generica_id' => 62],
            ['id' => 137, 'nombre' => 'LIMPIEZA', 'generica_id' => 62],
            ['id' => 138, 'nombre' => 'APLICATIVOS INFORMATICOS', 'generica_id' => 62],
            ['id' => 139, 'nombre' => 'PAGINA WEB', 'generica_id' => 62],
            ['id' => 140, 'nombre' => 'SOPORTE TECNICO', 'generica_id' => 62],
            ['id' => 141, 'nombre' => 'SOFTWARE', 'generica_id' => 62],
            ['id' => 142, 'nombre' => 'VIGILANCIA', 'generica_id' => 62],
            ['id' => 143, 'nombre' => 'IMPRESIÓN', 'generica_id' => 62],
            ['id' => 144, 'nombre' => 'SUB CONTRATA', 'generica_id' => 62],


            //MANTENIMIENTOS 63,
            ['id' => 56, 'nombre' => 'IMPRESORAS', 'generica_id' => 63],
            ['id' => 57, 'nombre' => 'EQUIPOS DE COMPUTO', 'generica_id' => 63],
            ['id' => 58, 'nombre' => 'SERVIDOR', 'generica_id' => 63],
            ['id' => 59, 'nombre' => 'HERRAMIENTAS DE OFICINA', 'generica_id' => 63],
            ['id' => 60, 'nombre' => 'OFICINA', 'generica_id' => 63],

            //HERRAMIENTAS 49,69

            ['id' => 61, 'nombre' => 'SELLOS', 'generica_id' => 49],
            ['id' => 62, 'nombre' => 'SILLAS', 'generica_id' => 49],
            ['id' => 63, 'nombre' => 'MESAS', 'generica_id' => 49],
            ['id' => 64, 'nombre' => 'COMPUTADORA GA', 'generica_id' => 49],
            ['id' => 65, 'nombre' => 'COMPUTADORA GM', 'generica_id' => 49],
            ['id' => 66, 'nombre' => 'COMPUTADORA GB', 'generica_id' => 49],
            ['id' => 67, 'nombre' => 'LAPTOPS', 'generica_id' => 49],
            ['id' => 68, 'nombre' => 'IMPRESORAS', 'generica_id' => 49],
            ['id' => 69, 'nombre' => 'FOTOCOPIADORAS', 'generica_id' => 49],
            ['id' => 70, 'nombre' => 'PLOTERS', 'generica_id' => 49],
            ['id' => 71, 'nombre' => 'PROYECTOR MULTIMEDIA', 'generica_id' => 49],
            ['id' => 72, 'nombre' => 'STANTES', 'generica_id' => 49],
            ['id' => 73, 'nombre' => 'ESCRITORIOS', 'generica_id' => 49],
            ['id' => 74, 'nombre' => 'AUDIFONOS', 'generica_id' => 49],
            ['id' => 75, 'nombre' => 'TACHOS (LIMPIEZA)', 'generica_id' => 49],
            ['id' => 76, 'nombre' => 'PERFORADORES', 'generica_id' => 49],
            ['id' => 77, 'nombre' => 'ENGRAMPADORES', 'generica_id' => 49],
            ['id' => 78, 'nombre' => 'PIZARRAS', 'generica_id' => 49],
            ['id' => 79, 'nombre' => 'MUEBLES', 'generica_id' => 49],
            ['id' => 80, 'nombre' => 'QUEMADOR EXTERNO', 'generica_id' => 49],
            ['id' => 81, 'nombre' => 'TELEFONOS', 'generica_id' => 49],
            ['id' => 82, 'nombre' => 'ESTABILIZADORES', 'generica_id' => 49],
            ['id' => 83, 'nombre' => 'CAMARA', 'generica_id' => 49],
            ['id' => 84, 'nombre' => 'CASE SWITCH/SSD', 'generica_id' => 49],
            ['id' => 85, 'nombre' => 'PARLANTES', 'generica_id' => 49],
            ['id' => 86, 'nombre' => 'PAD MOUSE', 'generica_id' => 49],
            ['id' => 87, 'nombre' => 'USB', 'generica_id' => 49],
            ['id' => 88, 'nombre' => 'FUENTE DE PODER', 'generica_id' => 49],
            ['id' => 89, 'nombre' => 'PROCESADOR', 'generica_id' => 49],
            ['id' => 90, 'nombre' => 'ADAPTADORES', 'generica_id' => 49],
            ['id' => 91, 'nombre' => 'ECRAN', 'generica_id' => 49],
            ['id' => 92, 'nombre' => 'ESTUFA', 'generica_id' => 49],
            ['id' => 93, 'nombre' => 'MONITOR', 'generica_id' => 49],

            ['id' => 201, 'nombre' => 'SELLOS', 'generica_id'=>69],
            ['id' => 202, 'nombre' => 'SILLAS', 'generica_id'=>69],
            ['id' => 203, 'nombre' => 'MESAS', 'generica_id'=>69],
            ['id' => 204, 'nombre' => 'COMPUTADORA GA', 'generica_id'=>69],
            ['id' => 205, 'nombre' => 'COMPUTADORA GM', 'generica_id'=>69],
            ['id' => 206, 'nombre' => 'COMPUTADORA GB', 'generica_id'=>69],
            ['id' => 207, 'nombre' => 'LAPTOPS', 'generica_id'=>69],
            ['id' => 208, 'nombre' => 'IMPRESORAS', 'generica_id'=>69],
            ['id' => 209, 'nombre' => 'FOTOCOPIADORAS', 'generica_id'=>69],
            ['id' => 210, 'nombre' => 'PLOTERS', 'generica_id'=>69],
            ['id' => 211, 'nombre' => 'PROYECTOR MULTIMEDIA', 'generica_id'=>69],
            ['id' => 212, 'nombre' => 'STANTES', 'generica_id'=>69],
            ['id' => 213, 'nombre' => 'ESCRITORIOS', 'generica_id'=>69],
            ['id' => 214, 'nombre' => 'AUDIFONOS', 'generica_id'=>69],
            ['id' => 215, 'nombre' => 'TACHOS (LIMPIEZA)', 'generica_id'=>69],
            ['id' => 216, 'nombre' => 'PERFORADORES', 'generica_id'=>69],
            ['id' => 217, 'nombre' => 'ENGRAMPADORES', 'generica_id'=>69],
            ['id' => 317, 'nombre' => 'PIZARRAS', 'generica_id'=>69],
            ['id' => 218, 'nombre' => 'MUEBLES', 'generica_id'=>69],
            ['id' => 219, 'nombre' => 'QUEMADOR EXTERNO', 'generica_id'=>69],
            ['id' => 220, 'nombre' => 'TELEFONOS', 'generica_id'=>69],
            ['id' => 230, 'nombre' => 'ESTABILIZADORES', 'generica_id'=>69],
            ['id' => 235, 'nombre' => 'CAMARA', 'generica_id'=>69],
            ['id' => 236, 'nombre' => 'CASE SWITCH/SSD', 'generica_id'=>69],
            ['id' => 237, 'nombre' => 'PARLANTES', 'generica_id'=>69],
            ['id' => 238, 'nombre' => 'PAD MOUSE', 'generica_id'=>69],
            ['id' => 239, 'nombre' => 'USB', 'generica_id'=>69],
            ['id' => 249, 'nombre' => 'FUENTE DE PODER', 'generica_id'=>69],
            ['id' => 250, 'nombre' => 'PROCESADOR', 'generica_id'=>69],
            ['id' => 260, 'nombre' => 'ADAPTADORES', 'generica_id'=>69],
            ['id' => 261, 'nombre' => 'ECRAN', 'generica_id'=>69],
            ['id' => 262, 'nombre' => 'ESTUFA', 'generica_id'=>69],
            ['id' => 263, 'nombre' => 'MONITOR', 'generica_id'=>69],
        
        ]);
    }
}
