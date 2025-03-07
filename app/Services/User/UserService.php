<?php

namespace App\Services\User;

use App\Models\User;

class UserService{

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
}