<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Services\RegistroService;
use Exception;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    
    /**
     * obtener los registros de un mes
     */
    public function get_registros_mes_actual(){
        return RegistroService::get_registros_mes_actual();
    }


    /**
     * obtener los ultimos 50 registros
     */
    public function get_ultimos_registros(){
        return RegistroService::get_ultimos_50_registros();
    }

    public function add_registro(Request $request){
        $request->validate([
            'fecha'=>'required|date',
            'descripcion'=>'required',
            'ordenes'=>'required',
            'proveedor'=>'required',
            'empresa'=>'required',

            'categoria'=>'required|array',
            'clasificacion'=>'required|array',

            'tipo_cuenta'=>'required',
            'comprobante'=>'required',
            'gasto'=>'required',
            'transaccion'=>'required',
            'utilidad'=>'required',
        ]);
        try{
            $registro=RegistroService::add_new_registro($request);
            return $registro;
        }catch(Exception $e){
            return response()->json(['message'=>'error al insertar el registro',$e->getMessage()],405);
        }
    }

    public function update_registro(Request $request){
        $request->validate([
            'fecha'=>'required|date',
            'descripcion'=>'required',
            'ordenes'=>'required',
            'proveedor'=>'required',
            'empresa'=>'required',

            'categoria'=>'required|array',
            'clasificacion'=>'required|array',

            'tipo_cuenta'=>'required',
            'comprobante'=>'required',
            'gasto'=>'required',
            'transaccion'=>'required',
            'utilidad'=>'required',
        ]);
        try{
            $registro=RegistroService::update_registro($request);
            return $registro;
        }catch(Exception $e){
            return response()->json(['message'=>'error al actualizar el registro',$e->getMessage()],405);
        }
    }

    public function delete_registro($id){
        try{
            return RegistroService::delete_registro($id);
        }catch(Exception $e){
            return response()->json(['message'=>'error al eliminar el registro',$e->getMessage()],405);
        }
    }

}



