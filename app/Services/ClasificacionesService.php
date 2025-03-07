<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Clasificacion;
use Illuminate\Http\Request;

class ClasificacionesService{
    
    public static function get_clasificaciones(){
        return Clasificacion::all()->map(function($cla){
            return [
                'id'=>$cla->id,
                'nombre'=>$cla->nombre,
                'estado'=>$cla->estado?true:false,
                'categoria'=>$cla->Categoria->nombre,
                'categoria_id'=>$cla->categoria_id,
            ];
        });
    }

    public static function add_clasificaion(Request $request){
        $clasificacion = new Clasificacion();
        $clasificacion->nombre = $request->nombre;
        $clasificacion->estado = 1;
        $clasificacion->categoria_id=$request->categoria;
        $clasificacion->save();

        return $clasificacion;
    }

    public static function update_clasificacion(Request $request, $id){
        $clasificacion =Clasificacion::find($id);
        $clasificacion->nombre = $request->nombre;
        $clasificacion->estado = 1;
        $clasificacion->categoria_id=$request->categoria;
        $clasificacion->save();
        return $clasificacion;
    }

    public static function delete_clasificacion($id){
        return [
            'id'=>$id
        ];
    }
    
}