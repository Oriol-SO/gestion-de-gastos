<?php

namespace App\Services;

use App\Models\ComprobanteTipo;
use Illuminate\Http\Request;

class ComprobanteTipoService{
    
    public static function get_comprobante_tipos(){
        return ComprobanteTipo::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado,
            ];
        });
    }

    public static function add_comprobante_tipo(Request $request){
        $comprobante_tipo = new ComprobanteTipo();
        $comprobante_tipo->nombre = $request->nombre;
        $comprobante_tipo->estado = 1;
        $comprobante_tipo->save();

        return $comprobante_tipo;
    }

    public static function update_comprobante_tipo(Request $request, $id){
        $comprobante_tipo =ComprobanteTipo::find($id);
        $comprobante_tipo->nombre = $request->nombre;
        $comprobante_tipo->estado = 1;
        $comprobante_tipo->save();
        return $comprobante_tipo;
    }

    public static function delete_comprobante_tipo($id){
        return [
            'id'=>$id
        ];
    }
    
}