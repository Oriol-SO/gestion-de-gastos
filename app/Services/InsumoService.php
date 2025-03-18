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
        $insumo = new Insumo();
        $insumo->nombre = $request->nombre;
        $insumo->estado = 1;
        $insumo->generica_id=$request->generica;
        $insumo->save();

        return $insumo;
    }

    public static function update_insumo(Request $request, $id){
        $insumo =Insumo::find($id);
        $insumo->nombre = $request->nombre;
        $insumo->estado = 1;
        $insumo->generica_id=$request->generica;
        $insumo->save();
        return $insumo;
    }

    public static function delete_insumo($id){
        return [
            'id'=>$id
        ];
    }
    
}