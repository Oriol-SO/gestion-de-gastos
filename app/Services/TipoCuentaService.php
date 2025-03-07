<?php

namespace App\Services;

use App\Models\CuentaTipo;
use Illuminate\Http\Request;

class TipoCuentaService{
    
    public static function get_tipocuentas(){
        return CuentaTipo::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado,
            ];
        });
    }

    public static function add_cuenta_tipo(Request $request){
        $CuentaTipo = new CuentaTipo();
        $CuentaTipo->nombre = $request->nombre;
        $CuentaTipo->estado = 1;
        $CuentaTipo->save();

        return $CuentaTipo;
    }

    public static function update_cuenta_tipo(Request $request, $id){
        $CuentaTipo =CuentaTipo::find($id);
        $CuentaTipo->nombre = $request->nombre;
        $CuentaTipo->estado = 1;
        $CuentaTipo->save();
        return $CuentaTipo;
    }

    public static function delete_cuenta_tipo($id){
        return [
            'id'=>$id
        ];
    }
    
}