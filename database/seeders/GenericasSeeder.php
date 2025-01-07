<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenericasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genericas')->insert([
            //MAQUINARIA
                ['id' => 1, 'categoria_id' => 1, 'nombre' => 'COMBUSTIBLE'],
                ['id' => 2, 'categoria_id' => 1, 'nombre' => 'MANTENIMIENTO'],
                ['id' => 3, 'categoria_id' => 1, 'nombre' => 'ACCESORIOS EQUIPOS'],
                ['id' => 4, 'categoria_id' => 1, 'nombre' => 'LETRAS'],
                ['id' => 5, 'categoria_id' => 1, 'nombre' => 'COMPRA'],
                ['id' => 6, 'categoria_id' => 1, 'nombre' => 'PAGO DE SEGUROS'],
                ['id' => 7, 'categoria_id' => 1, 'nombre' => 'PAGO DE ALQUILER'],
                ['id' => 8, 'categoria_id' => 1, 'nombre' => 'IMPUESTOS'],
                ['id' => 9, 'categoria_id' => 1, 'nombre' => 'MANO DE OBRA'],
                ['id' => 10, 'categoria_id' => 1, 'nombre' => 'CAJA CHICA'],
            //OBRAS
                ['id' => 11, 'categoria_id' => 2, 'nombre' => 'GASTO OBRA'],
                ['id' => 12, 'categoria_id' => 2, 'nombre' => 'GARANTIA DE FIANZAS'],
                ['id' => 13, 'categoria_id' => 2, 'nombre' => 'AUDITORIA DE OBRA'],
                ['id' => 14, 'categoria_id' => 2, 'nombre' => 'FACTURAS P PAGAR'],
                ['id' => 15, 'categoria_id' => 2, 'nombre' => 'FACTURAS A CREDITO'],
                ['id' => 16, 'categoria_id' => 2, 'nombre' => 'INTERESES POR PRESTAMOS'],
                ['id' => 17, 'categoria_id' => 2, 'nombre' => 'IMPUESTOS'],
                ['id' => 18, 'categoria_id' => 2, 'nombre' => 'GASTOS DE CONSORCIO'],
                ['id' => 19, 'categoria_id' => 2, 'nombre' => 'PAGO DE VALORIZACIONES'],
            
            //CONSULTORIA EXP
                ['id' => 20, 'categoria_id' => 3, 'nombre' => 'FACTURAS A CREDITO'],
                ['id' => 21, 'categoria_id' => 3, 'nombre' => 'GASTOS DE LICITACION'],
                ['id' => 22, 'categoria_id' => 3, 'nombre' => 'GASTOS DE CONSORCIO'],
                ['id' => 23, 'categoria_id' => 3, 'nombre' => 'PAGO CONSULTORIA EXTERNA'],
                ['id' => 24, 'categoria_id' => 3, 'nombre' => 'PAGO DE FICHA TECNICA'],
                ['id' => 25, 'categoria_id' => 3, 'nombre' => 'PERSONAL CLAVE'],
                ['id' => 26, 'categoria_id' => 3, 'nombre' => 'GATOS DE ESTADIA'],
                ['id' => 27, 'categoria_id' => 3, 'nombre' => 'MOVILIDAD'],
                ['id' => 28, 'categoria_id' => 3, 'nombre' => 'ESTUDIO TOPOGRAFICO'],
                ['id' => 29, 'categoria_id' => 3, 'nombre' => 'PUNTOS GEODESICOS'],
                ['id' => 30, 'categoria_id' => 3, 'nombre' => 'ESTUDIOS DE MECANICA DE SUELOS'],
                ['id' => 31, 'categoria_id' => 3, 'nombre' => 'ESTUDIOS DE FUENTES DE AGUA'],
                ['id' => 32, 'categoria_id' => 3, 'nombre' => 'ESTUDIOS DE VULNERABILIDAD'],
                ['id' => 33, 'categoria_id' => 3, 'nombre' => 'AUTORIZACION DE ANA'],
                ['id' => 34, 'categoria_id' => 3, 'nombre' => 'CIRAS Y/O PMA'],
                ['id' => 35, 'categoria_id' => 3, 'nombre' => 'CERTIFICACION AMBIENTAL'],
                ['id' => 36, 'categoria_id' => 3, 'nombre' => 'SANEAMIENTO FISICO LEGAL'],
                ['id' => 37, 'categoria_id' => 3, 'nombre' => 'DONACIONES'],
                ['id' => 38, 'categoria_id' => 3, 'nombre' => 'PAGO DE EXPEDIENTE'],
                ['id' => 39, 'categoria_id' => 3, 'nombre' => 'IMPUESTOS'],
                ['id' => 40, 'categoria_id' => 3, 'nombre' => 'ESTUDIO HIDROLOGICO E HIDRAULICO'],
            //CONSULTORIA SUPER
                ['id' => 41, 'categoria_id' => 4, 'nombre' => 'FACTURAS A CREDITO'],
                ['id' => 42, 'categoria_id' => 4, 'nombre' => 'GASTOS DE LICITACION'],
                ['id' => 43, 'categoria_id' => 4, 'nombre' => 'GASTOS DE CONSORCIO'],
                ['id' => 44, 'categoria_id' => 4, 'nombre' => 'SERVICIOS'],
                ['id' => 45, 'categoria_id' => 4, 'nombre' => 'PAGO PERSONAL'],
                ['id' => 46, 'categoria_id' => 4, 'nombre' => 'GASTOS DE ESTADIA'],
                ['id' => 47, 'categoria_id' => 4, 'nombre' => 'EQUIPOS DE SEGURIDAD'],
                ['id' => 48, 'categoria_id' => 4, 'nombre' => 'UTILES DE ESCRITORIO'],
                ['id' => 49, 'categoria_id' => 4, 'nombre' => 'HERRAMIENTAS DE OFICINA'],
                ['id' => 50, 'categoria_id' => 4, 'nombre' => 'CAMIONETA'],
                ['id' => 51, 'categoria_id' => 4, 'nombre' => 'GASTOS DE VISITA OBRA'],
                ['id' => 52, 'categoria_id' => 4, 'nombre' => 'PRIMAS DE FIANZA'],
                ['id' => 53, 'categoria_id' => 4, 'nombre' => 'ITF'],
                ['id' => 54, 'categoria_id' => 4, 'nombre' => 'SCTR'],
                ['id' => 55, 'categoria_id' => 4, 'nombre' => 'VIDA LEY'],
                ['id' => 56, 'categoria_id' => 4, 'nombre' => 'LIQUIDACION DE SUPER'],
                ['id' => 57, 'categoria_id' => 4, 'nombre' => 'GASTOS DE LICITACION'],
                ['id' => 58, 'categoria_id' => 4, 'nombre' => 'LABORATORIOS Y ESTUDIOS'],
                ['id' => 59, 'categoria_id' => 4, 'nombre' => 'ALQUILER OFICINA'],
                ['id' => 60, 'categoria_id' => 4, 'nombre' => 'PAGO DE SUPERVISION'],
                ['id' => 61, 'categoria_id' => 4, 'nombre' => 'IMPUESTOS'],
            //OFICINA
                ['id' => 62, 'categoria_id' => 5, 'nombre' => 'SERVICIOS'],
                ['id' => 63, 'categoria_id' => 5, 'nombre' => 'MANTENIMIENTO'],
                ['id' => 64, 'categoria_id' => 5, 'nombre' => 'PAGO PERSONAL'],
                ['id' => 65, 'categoria_id' => 5, 'nombre' => 'GASTOS DE REPRESENTACION'],
                ['id' => 66, 'categoria_id' => 5, 'nombre' => 'EQUIPOS DE SEGURIDAD'],
                ['id' => 67, 'categoria_id' => 5, 'nombre' => 'UTILES DE ESCRITORIO'],
                ['id' => 68, 'categoria_id' => 5, 'nombre' => 'AGUA Y CORTESIAS'],
                ['id' => 69, 'categoria_id' => 5, 'nombre' => 'HERRAMIENTAS DE OFICINA'],
                ['id' => 70, 'categoria_id' => 5, 'nombre' => 'MOVILIDAD'],
                ['id' => 71, 'categoria_id' => 5, 'nombre' => 'MARKETING'],
                ['id' => 72, 'categoria_id' => 5, 'nombre' => 'CAPACITACIONES'],
                ['id' => 73, 'categoria_id' => 5, 'nombre' => 'AUDITORIAS'],
                ['id' => 74, 'categoria_id' => 5, 'nombre' => 'ASESORIA LEGAL'],
                ['id' => 75, 'categoria_id' => 5, 'nombre' => 'EVENTOS'],
                ['id' => 76, 'categoria_id' => 5, 'nombre' => 'DONACIONES Y RECAUDACIONES'],
                ['id' => 77, 'categoria_id' => 5, 'nombre' => 'TRAMITES'],
                ['id' => 78, 'categoria_id' => 5, 'nombre' => 'CAJA CHICA'],
                ['id' => 79, 'categoria_id' => 5, 'nombre' => 'MATERIALES DE LIMPIEZA'],
            //PRESTAMOS

            //UTILIDADES
                
            //BANCOS
                
            //SUNAT
                
            //INVERSIONES
                
            //CASA
                
            //DEVOLUCIONES
        
        ]);
    }
}
