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
use App\Services\TipocuentaService;
use App\Services\TransaccionTipoService;
use Exception;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    public function get_categorias(){
        try{
            return CategoriaService::get_categorias();
        }catch(Exception $e){
            return response()->json(['messsage'=>'error al obtener la lista de categorias',$e->getMessage()],405);
        }
    }

    public function get_clasificaciones(){
        try{
            return ClasificacionesService::get_clasificaciones();
        }catch(Exception $e){
            return response()->json(['messsage'=>'error al obtener la lista de clasificaciones',$e->getMessage()],405);
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
            return TipocuentaService::get_tipocuentas();
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
