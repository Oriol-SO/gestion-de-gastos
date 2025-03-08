<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Services\CategoriaService;
use App\Services\ClasificacionesService;
use App\Services\ClasificacionSubItemService;
use App\Services\ComprobanteTipoService;
use App\Services\DetalleService;
use App\Services\GenericaService;
use App\Services\InsumoService;
use App\Services\TipoCuentaService;
use App\Services\TransaccionTipoService;
use Exception;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Grupo ed acciones de las categorias
     */
    public function get_categorias(){
        try{
            return CategoriaService::get_categorias();
        }catch(Exception $e){
            return response()->json(['messsage'=>'error al obtener la lista de categorias',$e->getMessage()],405);
        }
    }
    public function add_categoria(Request $request){
        $request->validate([
            'nombre'=>'required|max:255',
        ]);
        try{
            return CategoriaService::add_categoria($request);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }
    public function update_categoria(Request $request){
        $request->validate([
            'estado'=>'required|boolean',
            'nombre'=>'required|max:255',
            'id'=>'required|integer'
        ]);
        try{
            return CategoriaService::update_categoria($request,$request->id);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }

    /**
     * grupo de acciones de clasificaciones
     */
    public function get_clasificaciones(){
        try{
            return ClasificacionesService::get_clasificaciones();
        }catch(Exception $e){
            return response()->json(['messsage'=>'error al obtener la lista de clasificaciones',$e->getMessage()],405);
        }
    }
    public function add_new_clasificacion(Request $request){
        $request->validate([
            'nombre'=>'required|max:255',
            'categoria'=>'required|integer'
        ]);
        try{
            return ClasificacionesService::add_clasificaion($request);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }
    public function update_clasificacion(Request $request){
        $request->validate([
            'id'=>'required|integer',
            'nombre'=>'required|max:255',
            'categoria'=>'required|integer',
            'estado'=>'required|boolean',
        ]);
        try{
            return ClasificacionesService::update_clasificacion($request,$request->id);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }


    public function get_genericas(){
        try{
            return GenericaService::get_genericas();
        }catch(Exception $e){
            return response()->json(['message' => 'error al obtener datos genéricos', $e->getMessage()], 405);
        }
    }

    public function get_sub_items_clasificacion(){
        try{
            return ClasificacionSubItemService::get_subItems();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtener los sub items de la clasificacion',$e->getMessage()],405);
        }
    }

    public function get_all_insumos(){
        try{
            return InsumoService::get_insumos();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtener los insumos',$e->getMessage()],405);
        }
    }

    public function get_all_detalles(){
        try{
            return DetalleService::get_detalles();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtenter la lista de detalles',$e->getMessage()],405);
        }
    }

    public function get_all_tipo_cuentas(){
        try{
            return TipoCuentaService::get_tipocuentas();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtener la lista de tipos de cuentas',$e->getMessage()],405);
        }
    }

    public function get_all_tipo_comprobantes(){
        try{
            return ComprobanteTipoService::get_comprobante_tipos();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtener la lista de tipos de comprobantes',$e->getMessage()],405);
        }
    }

    
    public function get_all_tipo_transacciones(){
        try{
            return TransaccionTipoService::get_transaccionTipos();
        }catch(Exception $e){
            return response()->json(['message'=>'error al obtener la lista de tipos de comprobantes',$e->getMessage()],405);
        }
    }
}
