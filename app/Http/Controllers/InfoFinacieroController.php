<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Services\RegistroService;
use Exception;
use Illuminate\Http\Request;

class InfoFinacieroController extends Controller
{
    /**
     * Obtener los numero de la base de datos 
     * -gastos
     * -ingresos
     * -saldo restante
     * 
     * @return Response respuesta de la consulta
     */
    public function get_info(){
        try{
          return RegistroService::get_balance();
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }
}
