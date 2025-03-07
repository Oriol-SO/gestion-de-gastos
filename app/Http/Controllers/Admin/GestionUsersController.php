<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Request;

class GestionUsersController extends Controller
{
    //

    public function get_list_users(){
        try{
            return UserService::get_list_users();
        }catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],405);
        }
    }
}
