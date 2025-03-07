<?php

use App\Http\Controllers\Admin\GestionUsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'guest:api'],function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/user', [AuthController::class, 'me'])->name('me');

    Route::get('/registros',[RegistroController::class,'get_registros']);

    //recursos
    Route::get('/get-categorias',[RecursoController::class,'get_categorias']);
    Route::get('/get-all-clasificaciones',[RecursoController::class,'get_clasificaciones']);
    Route::get('/get-all-genericas',[RecursoController::class,'get_genericas']);
    Route::get('/get-all-sub-items-clasificacion',[RecursoController::class,'get_sub_items_clasificacion']);

    Route::get('/get-all-insumos',[RecursoController::class,'get_all_insumos']);
    Route::get('/get-all-detalles',[RecursoController::class,'get_all_detalles']);
    Route::get('/get-all-tipo-cuentas',[RecursoController::class,'get_all_tipo_cuentas']);
    Route::get('/get-all-tipo-comprobantes',[RecursoController::class,'get_all_tipo_comprobantes']);
    Route::get('/get-all-transaccion-tipos',[RecursoController::class,'get_all_tipo_transacciones']);



    Route::post('/add-new-registro',[RegistroController::class,'add_registro']);
    Route::post('/update-registro',[RegistroController::class,'update_registro']);
    Route::delete('/delete-registro/{id}',[RegistroController::class,'delete_registro']);



    //RUtas de admin
    Route::get('/get-list-users-for-admin',[GestionUsersController::class,'get_list_users']);
    
});
