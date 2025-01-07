<?php

namespace App\Services;

use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class TipocuentaService{
    
    public static function get_tipocuentas(){
        return TipoCuenta::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado,
            ];
        });
    }

    public static function add_tipocuenta(Request $request){
        $tipocuenta = new TipoCuenta();
        $tipocuenta->nombre = $request->nombre;
        $tipocuenta->estado = 1;
        $tipocuenta->save();

        return $tipocuenta;
    }

    public static function update_tipocuenta(Request $request, $id){
        $tipocuenta =TipoCuenta::find($id);
        $tipocuenta->nombre = $request->nombre;
        $tipocuenta->estado = 1;
        $tipocuenta->save();
        return $tipocuenta;
    }

    public static function delete_tipocuenta($id){
        return [
            'id'=>$id
        ];
    }
    
}