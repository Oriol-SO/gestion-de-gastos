<?php

namespace App\Services;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaService{
    
    public static function get_categorias(){
        return Categoria::all()->map(function($categoria){
            return [
                'id'=>$categoria->id,
                'nombre'=>$categoria->nombre,
                'estado'=>$categoria->estado?true:false,
            ];
        });
    }

    public static function add_categoria(Request $request){
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->estado = 1;
        $categoria->save();

        return $categoria;
    }

    public static function update_categoria(Request $request, $id){
        $categoria= Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->estado = $request->estado;
        $categoria->save();
    }

    public static function delete_categoria($id){
        return [
            'id'=>$id
        ];
    }
    
}