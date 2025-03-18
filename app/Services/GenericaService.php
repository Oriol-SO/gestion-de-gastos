<?php

namespace App\Services;

use App\Models\Categoria;
use App\Models\Generica;
use Illuminate\Http\Request;

class GenericaService{
    
    public static function get_genericas(){
        return Generica::all()->map(function($generica){
            return [
                'id'=>$generica->id,
                'nombre'=>$generica->nombre,
                'categoria'=>$generica->Categoria->nombre,
                'categoria_id'=>$generica->categoria_id,
                'compras'=>$generica->compras?true:false,
                'estado'=>$generica->estado?true:false,
            ];
        });
    }

    public static function add_generica(Request $request){
        $generica = new Generica();
        $generica->nombre = $request->nombre;
        $generica->estado = 1;
        $generica->categoria_id=$request->categoria;
        $generica->compras=0;
        $generica->save();

        return $generica;
    }

    public static function update_generica(Request $request, $id){
        $generica= Generica::find($id);
        $generica->nombre = $request->nombre;
        $generica->estado = $request->estado;
        $generica->categoria_id=$request->categoria;
        $generica->compras= $request->compras;
        $generica->save();

        return $generica;
    }

    public static function delete_generica($id){
        return [
            'id'=>$id
        ];
    }
    
}