<?php

namespace App\Services;

use App\Models\TransaccionTipo;
use Illuminate\Http\Request;

class TransaccionTipoService{
    
    public static function get_transaccionTipos(){
        return TransaccionTipo::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado,
            ];
        });
    }

    public static function add_transaccionTipo(Request $request){
        $transaccionTipo = new TransaccionTipo();
        $transaccionTipo->nombre = $request->nombre;
        $transaccionTipo->estado = 1;
        $transaccionTipo->save();

        return $transaccionTipo;
    }

    public static function update_transaccionTipo(Request $request, $id){
        $transaccionTipo =TransaccionTipo::find($id);
        $transaccionTipo->nombre = $request->nombre;
        $transaccionTipo->estado = 1;
        $transaccionTipo->save();
        return $transaccionTipo;
    }

    public static function delete_transaccionTipo($id){
        return [
            'id'=>$id
        ];
    }
    
}