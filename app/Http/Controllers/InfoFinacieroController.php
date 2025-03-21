<?php

namespace App\Http\Controllers;

use App\Services\ResumenService;
use Exception;
use Illuminate\Http\Request;

class InfoFinacieroController extends Controller
{
    /**
     * Obtener los numeros de la base de datos 
     * -gastos
     * -ingresos
     * -utilidades
     * -capital
     * 
     * @return Response respuesta de la consulta
     */
    public function get_info_resumen_financiero(Request $request){
        try{
        
            $request->validate([
                'tipo'=>'required|in:1,2,3'
            ]);
            
            if($request->tipo==1){
                //quiere decir por mes
                $request->validate([
                    'mes'=>'required'
                ]);
                return[
                    'resumen'=>ResumenService::get_resumen_financiero_mes($request),
                    'datos'=>ResumenService::get_grafico_for_mes($request),
                ];
         
            }
            if($request->tipo==2){
                //quiere decir resumen por año
                $request->validate([
                    'year'=>'required'
                ]);
                return[
                    'resumen'=>ResumenService::get_resumen_financiero_year($request),
                    'datos'=>ResumenService::get_grafico_for_year($request),
                ];
            }
            if($request->tipo==3){
                //personalizado entre un rango de fechas
                $request->validate([
                    'fecha1'=>'required|date',
                    'fecha2'=>'required|date',
                ]);
                return[
                    'resumen'=>ResumenService::get_resumen_financiero_personalizado($request),
                    'datos'=>ResumenService::get_grafico_personalizado($request)
                ];
            }
            abort(405,'no procesable');
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }


}
