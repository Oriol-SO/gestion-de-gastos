<?php

namespace App\Services;

use App\Models\CategoriaClasificacione;
use App\Models\ClasificacionSubItem;
use Illuminate\Http\Request;

class ClasificacionSubItemService{
    
    public static function get_subItems(){
        return ClasificacionSubItem::all()->map(function($s){
            return [
                'id'=>$s->id,
                'nombre'=>$s->nombre,
                'estado'=>$s->estado,
                'clasificacion_id'=>$s->clasificacion_id,
            ];
        });
    }

    public static function add_sub_item(Request $request){
        $subitem = new ClasificacionSubItem();
        $subitem->nombre = $request->nombre;
        $subitem->estado = 1;
        $subitem->clasificacion_id=$request->clasificacion;
        $subitem->save();

        return $subitem;
    }

    public static function update_sub_item(Request $request, $id){
        $subitem =ClasificacionSubItem::find($id);
        $subitem->nombre = $request->nombre;
        $subitem->estado = 1;
        $subitem->clasificacion_id=$request->clasificacion;
        $subitem->save();
        return $subitem;
    }

    public static function delete_clasificacion($id){
        return [
            'id'=>$id
        ];
    }
    
}