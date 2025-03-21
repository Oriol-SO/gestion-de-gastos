<?php
/**
 * servicio que se encarga de gestioar la informacion del dashboard
 */
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ResumenService{

    /**
     * obtener el resumen de un mes en especifico
     */
    public static function get_resumen_financiero_mes(Request $request){
        $mes = $request->mes; // Debe ser en formato 'YYYY-MM'
        $query = "SELECT 
                    SUM(gasto) AS gasto, 
                    SUM(ingreso) AS ingreso, 
                    SUM(utilidad) AS utilidad, 
                    SUM(capital) AS capital 
                FROM registros 
                WHERE fecha BETWEEN CONCAT(?, '-01') AND LAST_DAY(CONCAT(?, '-01'))";
        // Ejecutar consulta con valores enlazados
        $balance = DB::select($query, [$mes, $mes]);

        return $balance;
    }

    /**
     * obtener el resumen de un año en especifico
     */

    public static function get_resumen_financiero_year(Request $request){
        $year=$request->year;
        $query = "SELECT 
                    SUM(gasto) AS gasto, 
                    SUM(ingreso) AS ingreso, 
                    SUM(utilidad) AS utilidad, 
                    SUM(capital) AS capital 
                    FROM registros 
                    WHERE YEAR(fecha) =?";
        // Ejecutar consulta con valores enlazados
        $balance = DB::select($query, [$year]);

        return $balance;
    }

    /**
     * obtener el resumen de un rango de fechas 
     */

    public static function get_resumen_financiero_personalizado(Request $request){
        $fecha1=$request->fecha1;
        $fecha2=$request->fecha2;
        $query = "SELECT 
                    SUM(gasto) AS gasto, 
                    SUM(ingreso) AS ingreso, 
                    SUM(utilidad) AS utilidad, 
                    SUM(capital) AS capital 
                FROM registros 
                WHERE fecha BETWEEN ? AND ?";
        // Ejecutar consulta con valores enlazados
        $balance = DB::select($query, [$fecha1,$fecha2]);

        return $balance;
    }


    /**
     * obtener los datos de gastos e ingresos por día de un mes en especifico
     */
    public static function get_grafico_for_mes(Request $request){
        $mes=$request->mes;
        $query="SELECT 
                    DATE(fecha) AS dia, 
                    SUM(gasto) AS gastos,
                    SUM(ingreso) AS ingresos,
                    (SUM(ingreso) - SUM(gasto)) AS balance
                FROM registros
                WHERE fecha BETWEEN CONCAT(?, '-01') AND LAST_DAY(CONCAT(?, '-01'))
                GROUP BY DATE(fecha)
                ORDER BY dia";
        $result = DB::select($query, [$mes, $mes]);
        Carbon::setLocale('es');
        $datos=collect($result)->map(function($r){
            return [
                'dia' => $r->dia,
                'gastos' => $r->gastos,
                'ingresos' => $r->ingresos,
                'balance' => $r->ingresos - $r->gastos, // Calcula el balance
                'fecha' => Carbon::parse($r->dia)->translatedFormat('d M'), // Formato "10 Mar"
            ];
        });
        return $datos;
    }

    /**
     * obtener los datos de gastos e ingresos por meses de un año en especifico
     */
    public static function get_grafico_for_year(Request $request){
        $year=$request->year;
        $query = "SELECT 
                        DATE_FORMAT(fecha, '%Y-%m') AS mes, 
                        SUM(gasto) AS gastos,
                        SUM(ingreso) AS ingresos,
                        (SUM(ingreso) - SUM(gasto)) AS balance
                    FROM registros
                    WHERE YEAR(fecha) = ?
                    GROUP BY mes
                    ORDER BY mes";
        // Ejecutar consulta con valores enlazados
        $result = DB::select($query, [$year]);

        Carbon::setLocale('es');
        $datos=collect($result)->map(function($r){
            return [
                'mes' => $r->mes,
                'gastos' => $r->gastos,
                'ingresos' => $r->ingresos,
                'balance' => $r->ingresos - $r->gastos, // Calcula el balance
                'fecha' => Carbon::parse($r->mes.'-01')->translatedFormat('M-Y'), // Formato "10 Mar"
            ];
        });
        return $datos;
    }


    /**
     * obtener los datos de gastos e ingresos por dias entre dos fechas determinadas
     */

     public static function get_grafico_personalizado(Request $request){
        $fecha1=$request->fecha1;
        $fecha2=$request->fecha2;

        $query="SELECT 
                    DATE(fecha) AS dia, 
                    SUM(gasto) AS gastos,
                    SUM(ingreso) AS ingresos,
                    (SUM(ingreso) - SUM(gasto)) AS balance
                FROM registros
                WHERE fecha BETWEEN ? AND ?
                GROUP BY dia
                ORDER BY dia";
        $results = DB::select($query, [$fecha1,$fecha2]);

        Carbon::setLocale('es');
        $datos=collect($results)->map(function($r){
            return [
                'dia' => $r->dia,
                'gastos' => $r->gastos,
                'ingresos' => $r->ingresos,
                'balance' => $r->ingresos - $r->gastos, // Calcula el balance
                'fecha' => Carbon::parse($r->dia)->format('d/m/y')
            ];
        });
        return $datos;
     }


}