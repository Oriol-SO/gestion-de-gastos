<?php

namespace App\Services;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoService{
    
    public static function get_insumos(){
        return Insumo::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'generica'=>$s->Generica->nombre,
                'estado'=>$s->estado?true:false,
                'generica_id'=>$s->generica_id,
            ];
        });
    }

    public static function add_insumo(Request $request){
        $subitem = new Insumo();
        $subitem->nombre = $request->nombre;
        $subitem->estado = 1;
        $subitem->generica_id=$request->generica;
        $subitem->save();

        return $subitem;
    }

    public static function update_insumo(Request $request, $id){
        $subitem =Insumo::find($id);
        $subitem->nombre = $request->nombre;
        $subitem->estado = 1;
        $subitem->generica_id=$request->generica;
        $subitem->save();
        return $subitem;
    }

    public static function delete_insumo($id){
        return [
            'id'=>$id
        ];
    }
    
}