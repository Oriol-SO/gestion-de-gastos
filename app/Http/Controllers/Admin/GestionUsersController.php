<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Request;

class GestionUsersController extends Controller
{
    //

    /**
     * Obtiene la lista de todos los usuarios
     * 
     * @return  array lista con todos los usuarios
     */
    public function get_list_users(){
        try{
            return UserService::get_list_users();
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }
    /**
     * Creacion de un nuevo usuario
     * 
     * @param Request $request La solicitud http con los datos del formulario
     * @return User El nuevo usuario creado
     */

    public function add_new_user(Request $request){
        $request->validate([
            'nombre'=>'required|max:255',
            'apellido_paterno'=>'required|max:255',
            'apellido_materno'=>'required|max:255',
            'email'=>'required|email|max:255',
            'rol'=>'required|integer',
        ]);
        try{
            //validar que no exista otro usuario con el mismo correo
            $us=User::where('email',$request->email)->first();
            if($us){
               abort(405,'Ya existe otro usuario con el mismo correo');
            }

            //creamos el usuario
            return UserService::create_new_user($request);

        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }

    /**
     * Actualizaciób de los datos de un usuario
     * 
     * @param Request $request La solicitud http con los datos del formulario
     * @return User El nuevo usuario creado
     */
    public function update_user(Request $request){
        $request->validate([
            'id'=>'required|integer',
            'nombre'=>'required|max:255',
            'apellido_paterno'=>'required|max:255',
            'apellido_materno'=>'required|max:255',
            'email'=>'required|email|max:255',
            'estado'=>'required|boolean',
            'resetear'=>'required|boolean'
        ]);
        try{
             //validar que no exista otro usuario con el mismo correo omitiendo al usuario que se esta editando
             $us=User::where('email',$request->email)->where('id','<>',$request->id)->first();
             if($us){
                abort(405,'Ya existe otro usuario con el mismo correo');
             }
             $user=User::findOrFail($request->id);
             return UserService::update_user($request,$user);
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }


    }
}
