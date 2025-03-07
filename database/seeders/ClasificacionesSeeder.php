<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clasificaciones')->insert(
            [
            //MAQUINARIA
                [
                    'id' => 1,
                    'nombre' => 'AUTOHORMIGONERA 1',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 2,
                    'nombre' => 'AUTOHORMIGONERA 2',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 3,
                    'nombre' => 'MINICARGADOR',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 4,
                    'nombre' => 'RODILLO CHUPETERO',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 5,
                    'nombre' => 'CAMIONETA W6A- 785',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 6,
                    'nombre' => 'CAMIONETA W6Y- 745',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 7,
                    'nombre' => 'RETROEXCAVADORA',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 8,
                    'nombre' => 'CAMIONETA W4U-425',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 9,
                    'nombre' => 'CAMIONETA RAIZER',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 10,
                    'nombre' => 'CAMIONETA NUEVA',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 11,
                    'nombre' => 'MAQUINARIA LIVIANA',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 12,
                    'nombre' => 'MAQUINARIA PESADA',
                    'categoria_id' => 1,
                ],
                [
                    'id' => 13,
                    'nombre' => 'OFICINA MAQUINARIAS',
                    'categoria_id' => 1,
                ],

            //OBRAS
            
                [
                    'id' => 14,
                    'nombre' => 'PISTA SINCOS 2',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 15,
                    'nombre' => 'PISTA QUICHUAS',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 16,
                    'nombre' => 'PISTA YANACANCHA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 17,
                    'nombre' => 'PAMPAS',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 18,
                    'nombre' => 'PISTA MONTECOLPA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 19,
                    'nombre' => 'PISTA HUANCANI 2',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 20,
                    'nombre' => 'PISTA GILAPATA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 21,
                    'nombre' => 'PISTA PILCOS',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 22,
                    'nombre' => 'PISTA YAULI 1',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 23,
                    'nombre' => 'OBRA SA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 24,
                    'nombre' => 'ALMACEN CENTRAL',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 25,
                    'nombre' => 'HUANCAPITE',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 26,
                    'nombre' => 'AMBO',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 27,
                    'nombre' => 'SP DE CHUNAN',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 28,
                    'nombre' => 'CHONGOS ALTO',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 29,
                    'nombre' => 'PILCOMAYO-INCAS',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 30,
                    'nombre' => 'PILCOMAYO-ARICA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 31,
                    'nombre' => 'SANEAMIENTO SINCOS',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 32,
                    'nombre' => 'PARCO',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 33,
                    'nombre' => 'ÑAHUIMPUQUIO',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 34,
                    'nombre' => 'SALCAHUASI',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 35,
                    'nombre' => 'EL CARMEN',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 36,
                    'nombre' => 'CURICACA',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 37,
                    'nombre' => 'LEONOR ORDOÑEZ',
                    'categoria_id' => 2,
                ],
                [
                    'id' => 38,
                    'nombre' => 'PAUCARA',
                    'categoria_id' => 2,
                ],
            
            
            //CONSULTORIA EXP
                ['id' => 39, 'nombre' => 'HONORIA', 'categoria_id' => 3],
                ['id' => 40, 'nombre' => 'AMBO 30 DE JULIO', 'categoria_id' => 3],
                ['id' => 41, 'nombre' => 'SEPAHUA', 'categoria_id' => 3],
                ['id' => 42, 'nombre' => 'AMBO AYANCOCHA', 'categoria_id' => 3],
                ['id' => 43, 'nombre' => 'CHONGOS ALTO', 'categoria_id' => 3],
                ['id' => 44, 'nombre' => 'HUALA', 'categoria_id' => 3],
                ['id' => 45, 'nombre' => 'LEONOR ORDOÑEZ', 'categoria_id' => 3],
                ['id' => 46, 'nombre' => 'RANRA', 'categoria_id' => 3],
                ['id' => 47, 'nombre' => 'PACA', 'categoria_id' => 3],
                ['id' => 48, 'nombre' => 'SINCOS', 'categoria_id' => 3],
                ['id' => 49, 'nombre' => 'P. LAMBRAS', 'categoria_id' => 3],
                ['id' => 50, 'nombre' => 'RIEGO YANACANCHA', 'categoria_id' => 3],
                ['id' => 51, 'nombre' => 'P_EC_C_P', 'categoria_id' => 3],
                ['id' => 52, 'nombre' => 'P_C_C_J', 'categoria_id' => 3],
                ['id' => 53, 'nombre' => 'P_PI_H_M', 'categoria_id' => 3],
                ['id' => 54, 'nombre' => 'P_CH_P_T_H', 'categoria_id' => 3],
                ['id' => 55, 'nombre' => 'P_RO_TA_Q', 'categoria_id' => 3],
                ['id' => 56, 'nombre' => 'P_CU_RO_CHA', 'categoria_id' => 3],
                ['id' => 57, 'nombre' => 'P_AC_J_Y', 'categoria_id' => 3],
                ['id' => 58, 'nombre' => 'PA_AC_J_Y', 'categoria_id' => 3],
                ['id' => 59, 'nombre' => 'P_J_J_CO', 'categoria_id' => 3],
                ['id' => 60, 'nombre' => 'P_L_CH', 'categoria_id' => 3],
                ['id' => 61, 'nombre' => 'P_Y_J_J', 'categoria_id' => 3],
                ['id' => 62, 'nombre' => 'P_H_CH_J', 'categoria_id' => 3],
                ['id' => 63, 'nombre' => 'P_S_L_J_J', 'categoria_id' => 3],
                ['id' => 64, 'nombre' => 'P_C_T_H', 'categoria_id' => 3],
                ['id' => 65, 'nombre' => 'P_Y_A_J', 'categoria_id' => 3],
                ['id' => 66, 'nombre' => 'P_C_Y_P_T', 'categoria_id' => 3],
                ['id' => 67, 'nombre' => 'P_S_A_H', 'categoria_id' => 3],
                ['id' => 68, 'nombre' => 'P_H_O_N', 'categoria_id' => 3],
                ['id' => 69, 'nombre' => 'P_S_E', 'categoria_id' => 3],
                ['id' => 70, 'nombre' => 'P_C_S_T_H', 'categoria_id' => 3],
                ['id' => 71, 'nombre' => 'P_P_P_H', 'categoria_id' => 3],
                ['id' => 72, 'nombre' => 'P_S_A_P_A_A_H', 'categoria_id' => 3],
                ['id' => 73, 'nombre' => 'P_P_CH_J', 'categoria_id' => 3],
                ['id' => 74, 'nombre' => 'P_C_C_C', 'categoria_id' => 3],
                ['id' => 75, 'nombre' => 'P_J_P', 'categoria_id' => 3],
                ['id' => 76, 'nombre' => 'P_Ñ_H', 'categoria_id' => 3],
                ['id' => 77, 'nombre' => 'CH_J_J', 'categoria_id' => 3],
                ['id' => 78, 'nombre' => 'CA_H_J', 'categoria_id' => 3],
                ['id' => 79, 'nombre' => 'R_C_T_H', 'categoria_id' => 3],
                ['id' => 80, 'nombre' => 'C_J_J_J', 'categoria_id' => 3],
                ['id' => 81, 'nombre' => 'P_H_H', 'categoria_id' => 3],
                ['id' => 82, 'nombre' => 'SL_J_J', 'categoria_id' => 3],
                ['id' => 83, 'nombre' => 'P_T_A_H', 'categoria_id' => 3],
                ['id' => 84, 'nombre' => 'P_Q_S', 'categoria_id' => 3],
                ['id' => 85, 'nombre' => 'P_Q_O', 'categoria_id' => 3],
                ['id' => 86, 'nombre' => 'P_E_C', 'categoria_id' => 3],
                ['id' => 87, 'nombre' => 'P_P_PQ', 'categoria_id' => 3],
                ['id' => 88, 'nombre' => 'J_J', 'categoria_id' => 3],
                ['id' => 89, 'nombre' => 'P_L_A_H', 'categoria_id' => 3],
                ['id' => 90, 'nombre' => 'A_J_J', 'categoria_id' => 3],
                ['id' => 91, 'nombre' => 'P_J_J', 'categoria_id' => 3],
                ['id' => 92, 'nombre' => 'P_S_J_J', 'categoria_id' => 3],
                ['id' => 93, 'nombre' => 'P_P_H', 'categoria_id' => 3],
                ['id' => 94, 'nombre' => 'Ñ_T_H', 'categoria_id' => 3],
                ['id' => 95, 'nombre' => 'CHA', 'categoria_id' => 3],
                ['id' => 96, 'nombre' => 'P_Q_Y', 'categoria_id' => 3],
                ['id' => 97, 'nombre' => 'P_A_N', 'categoria_id' => 3],
                ['id' => 98, 'nombre' => 'DP_P_ÑH', 'categoria_id' => 3],
                ['id' => 99, 'nombre' => 'DR_RO_TA_T', 'categoria_id' => 3],
                ['id' => 100, 'nombre' => 'P_Ñ_H', 'categoria_id' => 3],
                ['id' => 101, 'nombre' => 'A_A_C_AMBO', 'categoria_id' => 3],
                ['id' => 102, 'nombre' => 'A_A_HV', 'categoria_id' => 3],
                ['id' => 103, 'nombre' => 'P_P_S', 'categoria_id' => 3],
                ['id' => 104, 'nombre' => 'C_C_H', 'categoria_id' => 3],
                ['id' => 105, 'nombre' => 'P_S_J', 'categoria_id' => 3],
                ['id' => 106, 'nombre' => 'P_J_J', 'categoria_id' => 3],
                ['id' => 107, 'nombre' => 'P_I_H_J', 'categoria_id' => 3],
                ['id' => 108, 'nombre' => 'HUACHAC', 'categoria_id' => 3],
                ['id' => 109, 'nombre' => 'QUIMILLO', 'categoria_id' => 3],
                ['id' => 110, 'nombre' => 'MUQUIYAUYO', 'categoria_id' => 3],
                ['id' => 111, 'nombre' => 'PAMPACRUZ', 'categoria_id' => 3],
                ['id' => 112, 'nombre' => 'SACSA', 'categoria_id' => 3],
                ['id' => 113, 'nombre' => 'B. CHALAPAMPA - YACURAQUINA', 'categoria_id' => 3],
                ['id' => 114, 'nombre' => 'UNION PACCHA', 'categoria_id' => 3],
                ['id' => 115, 'nombre' => 'QUINTA OCCO', 'categoria_id' => 3],
            //CONSULTORIA SUPER
                ['id' => 116, 'nombre' => 'LEONOR 2', 'categoria_id' => 4],
                ['id' => 117, 'nombre' => 'YANACANCHA', 'categoria_id' => 4],
                ['id' => 118, 'nombre' => 'GILAPATA', 'categoria_id' => 4],
                ['id' => 119, 'nombre' => 'CHUNAN', 'categoria_id' => 4],
                ['id' => 120, 'nombre' => 'AMBO', 'categoria_id' => 4],
                ['id' => 121, 'nombre' => 'HUANCAPITE', 'categoria_id' => 4],
                ['id' => 122, 'nombre' => 'CHONGOS ALTO', 'categoria_id' => 4],
            //OFICINA
                ['id' => 123, 'nombre' => 'OFICINA DE OBRAS', 'categoria_id' => 5],
                ['id' => 124, 'nombre' => 'OFICINA DE CONSULTORIAS', 'categoria_id' => 5],
                ['id' => 125, 'nombre' => 'OFICINA DE ALMACEN CENTRAL', 'categoria_id' => 5],
            //PRESTAMOS
                ['id' => 126, 'nombre' => 'BANCOS', 'categoria_id' => 6],
                ['id' => 127, 'nombre' => 'PERSONA JURIDICA', 'categoria_id' => 6],
                ['id' => 128, 'nombre' => 'PERSONA NATURAL', 'categoria_id' => 6],
                ['id' => 129, 'nombre' => 'SOCIOS', 'categoria_id' => 6],
                ['id' => 130, 'nombre' => 'INTERESES', 'categoria_id' => 6],
                ['id' => 131, 'nombre' => 'MORAS', 'categoria_id' => 6],
                ['id' => 132, 'nombre' => 'INTERESES GANADOS', 'categoria_id' => 6],
            //UTILIDADES
                ['id' => 133, 'nombre' => 'UTILIDADES', 'categoria_id' => 7],
            //BANCOS
                ['id' => 134, 'nombre' => 'MANTENIMIENTOS', 'categoria_id' => 8],
                ['id' => 135, 'nombre' => 'COMISIONES', 'categoria_id' => 8],
                ['id' => 136, 'nombre' => 'INTERESES DE BANCO', 'categoria_id' => 8],
                ['id' => 137, 'nombre' => 'CAPITAL INICIAL', 'categoria_id' => 8],
                ['id' => 138, 'nombre' => 'TRANSF ENTRE CUENTAS', 'categoria_id' => 8],
            //SUNAT
                ['id' => 139, 'nombre' => 'MULTAS', 'categoria_id' => 9],
                ['id' => 140, 'nombre' => 'OTROS', 'categoria_id' => 9],
            //INVERSIONES
                ['id' => 141, 'nombre' => 'INMUEBLES', 'categoria_id' => 10],
                ['id' => 142, 'nombre' => 'BOLSA DE VALORES', 'categoria_id' => 10],
            //CASA
                ['id' => 143, 'nombre' => 'ALIMENTACION', 'categoria_id' => 11],
                ['id' => 144, 'nombre' => 'ROPA', 'categoria_id' => 11],
                ['id' => 145, 'nombre' => 'GUSTOS', 'categoria_id' => 11],
                ['id' => 146, 'nombre' => 'SALUD', 'categoria_id' => 11],
                ['id' => 147, 'nombre' => 'DIVERSION', 'categoria_id' => 11],
                ['id' => 148, 'nombre' => 'VIAJES', 'categoria_id' => 11],
                ['id' => 149, 'nombre' => 'SERVICIOS', 'categoria_id' => 11],
                ['id' => 150, 'nombre' => 'ESTUDIOS', 'categoria_id' => 11]
            //DEVOLUCIONES

            ]
            
        );
    }
}
