<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\CategoriaClasificacione;
use Illuminate\Http\Request;

class ClasificacionesService{
    
    public static function get_clasificaciones(){
        return CategoriaClasificacione::all()->map(function($cla){
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
        $clasificacion = new CategoriaClasificacione();
        $clasificacion->nombre = $request->nombre;
        $clasificacion->estado = 1;
        $clasificacion->categoria_id=$request->categoria;
        $clasificacion->save();

        return $clasificacion;
    }

    public static function update_clasificacion(Request $request, $id){
        $clasificacion =CategoriaClasificacione::find($id);
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