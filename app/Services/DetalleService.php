<?php

namespace App\Services;

use App\Models\Detalle;
use Illuminate\Http\Request;

class DetalleService{
    
    public static function get_detalles(){
        return Detalle::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado?true:false,
                'insumo'=>$s->Insumo->nombre,
                'insumo_id'=>$s->insumo_id,
            ];
        });
    }

    public static function add_detalle(Request $request){
        $detalle = new Detalle();
        $detalle->nombre = $request->nombre;
        $detalle->estado = 1;
        $detalle->insumo_id=$request->insumo;
        $detalle->save();

        return $detalle;
    }

    public static function update_detalle(Request $request, $id){
        $detalle =Detalle::find($id);
        $detalle->nombre = $request->nombre;
        $detalle->estado = $request->estado;
        $detalle->insumo_id=$request->insumo;
        $detalle->save();
        return $detalle;
    }

    public static function delete_detalle($id){
        return [
            'id'=>$id
        ];
    }
    
}