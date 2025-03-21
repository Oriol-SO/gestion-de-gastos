<?php

namespace App\Services;

use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class RegistroService{
    
    private static function query_constructor_registros($codicion=null,$limit=null){
        $limite=null;
        if($limit){
            $limite="limit $limit";
        }
        $query="SELECT
            r.*,
            c.nombre as categoria,
            cc.nombre as clasificacion,
            g.nombre as generica,
            compra.nombre as compra,
            ins.nombre as insumo,
            d.nombre as detalle,
            t.nombre as tipo_cuenta,
            comp.nombre as comprobante,
            tra.nombre as transaccion
            
            from registros as r 
            inner join categorias as c on c.id= r.categoria_id
            inner join clasificaciones as cc on cc.id=r.clasificacion_id
            left join genericas as g on g.id=r.generica_id
            left join clasificacion_compras as compra on compra.id=r.clasificacioncompra_id
            left join insumos as ins on ins.id=r.insumo_id
            left join detalles as d on d.id=r.detalle_id
            left join cuenta_tipos as t on t.id=r.cuentatipo_id
            left join comprobante_tipos as comp on comp.id=r.comprobante_id
            left join transaccion_tipos as tra on tra.id=r.transaccion_id ".$codicion." 
            order by r.id desc ".$limite;

        return $query;
    }

    public static function get_registros_mes_actual(){
        $month=Carbon::now()->month;
        $year=Carbon::now()->year;
        $where="WHERE MONTH( $month )= ? AND YEAR($year)= ?";
        $query=self::query_constructor_registros($where);
        $registros =DB::select($query);
        return $registros;
    }

    public static function get_ultimos_50_registros(){
        $query=self::query_constructor_registros(null,50);
        $registros =DB::select($query);
        return $registros;
    }

    public static function add_new_registro(Request $request){

        $registro= new Registro();

        $registro->fecha=$request->fecha;
        $registro->descripcion=$request->descripcion;
        $registro->ordenes=$request->ordenes;
        $registro->proveedor=$request->proveedor;
        $registro->empresa= $request->empresa;

        $registro->categoria_id=$request->categoria['id'];
        $registro->clasificacion_id=$request->clasificacion['id'];

        $registro->generica_id=$request->generica_gastos?$request->generica_gastos['id']:null;
        $registro->clasificacioncompra_id=$request->compra?$request->compra['id']:null;
        $registro->insumo_id=$request->insumos?$request->insumos['id']:null;
        $registro->detalle_id=$request->detalles?$request->detalles['id']:null;

        $registro->cuentatipo_id=$request->tipo_cuenta;
        $registro->comprobante_id=$request->comprobante;
        $registro->gasto=$request->gasto;
        $registro->ingreso=$request->ingreso;
        $registro->transaccion_id=$request->transaccion;
        $registro->capital=$request->capital;
        $registro->utilidad=$request->utilidad;
        $registro->usercreator_id=2;

        $registro->save();

        return $registro;

    }

    public static function update_registro(Request $request){
        $registro=Registro::findOrFail($request->id);
        $registro->fecha=$request->fecha;
        $registro->descripcion=$request->descripcion;
        $registro->ordenes=$request->ordenes;
        $registro->proveedor=$request->proveedor;
        $registro->empresa= $request->empresa;

        $registro->categoria_id=$request->categoria['id'];
        $registro->clasificacion_id=$request->clasificacion['id'];

        $registro->generica_id=$request->generica_gastos?$request->generica_gastos['id']:null;
        $registro->clasificacioncompra_id=$request->compra?$request->compra['id']:null;
        $registro->insumo_id=$request->insumos?$request->insumos['id']:null;
        $registro->detalle_id=$request->detalles?$request->detalles['id']:null;

        $registro->cuentatipo_id=$request->tipo_cuenta;
        $registro->comprobante_id=$request->comprobante;
        $registro->gasto=$request->gasto;
        $registro->ingreso=$request->ingreso;
        $registro->transaccion_id=$request->transaccion;
        $registro->capital=$request->capital;
        $registro->utilidad=$request->utilidad;

        $registro->save();

        return $registro;
    }

    public static function delete_registro($id){
        $registro=Registro::findOrFail($id);
        $registro->delete();

        return 'ok';
    }

    public static function get_total_registros_for_categoria(){
        $query="SELECT c.nombre AS categoria, COUNT(p.id) AS registros
        FROM categorias c
        inner JOIN registros p ON c.id = p.categoria_id
        GROUP BY c.id, c.nombre";
        $total =DB::select($query);
        return $total;
    }

    /**
     * obtnemos los registros aplicando todos los filtros
     */
    public static function get_registros_filtro(Request $request){
        $tipo=null;
        $categoria=null;
        $fechas=null;

        if($request->categoria){
            $categoria="c.id= $request->categoria";
        }
        if($request->fecha1 && $request->fecha2){
            $fechas="r.fecha BETWEEN '$request->fecha1' AND '$request->fecha2' ";
        }
   
        if($request->tipo){
            $tipo=$request->tipo==1?"r.ingreso is not null":"r.gasto is not null";
        }
        //armamos la condicion
        $condicion=null;
        if($categoria){
            $condicion=$categoria;
        }
        if($fechas){
            if($condicion){
                $condicion="$condicion AND $fechas";
            }else{
                $condicion=$fechas;
            }
        }
        if($tipo){
            if($condicion){
                $condicion="$condicion AND $tipo";
            }else{
                $condicion=$tipo;
            }
        }
        $condicion=$condicion?"WHERE $condicion":null;
        $query=self::query_constructor_registros($condicion);
        $registros =DB::select($query);
        return $registros;
    }

}