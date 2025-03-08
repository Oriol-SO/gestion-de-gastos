<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService{

    /**
     * Lista de usuarios desde la base de datos
     */
    public static function get_list_users(){
        return User::all()->map(function($u){
            return[
                'id'=>$u->id,
                'name'=>$u->name,
                'nombres'=>"$u->ape_pat $u->ape_mat, $u->name",
                'ape_pat'=>$u->ape_pat,
                'ape_mat'=>$u->ape_mat,
                'documento'=>$u->documento,
                'email'=>$u->email,
                'rol_id'=>$u->rol_id,
                'rol'=>$u->rol_id==1?'Administrador':'Financiero',
                'estado'=>$u->estado,
            ];
        });
    }

    /**
     * insertar un nuevo usuario
     * @param Request $request informacion del nuevo usuario
     */
    public static function create_new_user(Request $request):User{
        $user = new User();
        $user->name=$request->nombre;
        $user->documento=$request->documento;
        $user->ape_pat=$request->apellido_paterno;
        $user->ape_mat=$request->apellido_materno;
        $user->email=$request->email;
        $user->rol_id=$request->rol;
        $user->password=Hash::make($request->documento);
        $user->save();
        
        return $user;
    }

    /**
     * Actualizar la informacion de un usuario
     * @param Request $request Informacion del usuario a editar
     * @param User $user Usuario que se actualizará la información
     */

    public static function update_user(Request $request,User $user):User{
        $user->name=$request->nombre;
        $user->documento=$request->documento;
        $user->ape_pat=$request->apellido_paterno;
        $user->ape_mat=$request->apellido_materno;
        $user->email=$request->email;
        $user->estado=$request->estado;
        if($request->resetear){
            $user->password=Hash::make($request->documento);
        }
        $user->save();
        return $user;
    }
}