<?php

use App\Http\Controllers\Admin\GestionUsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InfoFinacieroController;
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


    //recursos
    //categoria
    Route::get('/get-categorias',[RecursoController::class,'get_categorias']);
    Route::post('/add-new-categoria',[RecursoController::class,'add_categoria']);
    Route::post('/update-categoria',[RecursoController::class,'update_categoria']);

    //clasificacion
    Route::get('/get-all-clasificaciones',[RecursoController::class,'get_clasificaciones']);
    Route::post('/add-new-clasificacion',[RecursoController::class,'add_new_clasificacion']);
    Route::post('/update-clasificacion',[RecursoController::class,'update_clasificacion']);

    //clasificaciones compra
    Route::get('/get-all-sub-items-clasificacion',[RecursoController::class,'get_sub_items_clasificacion']);
    Route::post('/add-new-item-compra',[RecursoController::class,'add_new_item_compra']);
    Route::post('/update-item-compra',[RecursoController::class,'update_item_compra']);
    
    //Generica    
    Route::get('/get-all-genericas',[RecursoController::class,'get_genericas']);
    Route::post('/add-new-generica',[RecursoController::class,'add_new_generica']);
    Route::post('/update-generica',[RecursoController::class,'update_generica']);

    //insumos
    Route::get('/get-all-insumos',[RecursoController::class,'get_all_insumos']);
    Route::post('/add-new-insumo',[RecursoController::class,'add_new_insumo']);
    Route::post('/update-insumo',[RecursoController::class,'update_insumo']);

    //detalles
    Route::get('/get-all-detalles',[RecursoController::class,'get_all_detalles']);
    Route::post('/add-new-detalle',[RecursoController::class,'add_new_detalle']);
    Route::post('/update-detalle',[RecursoController::class,'update_detalle']);

    Route::get('/get-all-tipo-cuentas',[RecursoController::class,'get_all_tipo_cuentas']);
    Route::get('/get-all-tipo-comprobantes',[RecursoController::class,'get_all_tipo_comprobantes']);
    Route::get('/get-all-transaccion-tipos',[RecursoController::class,'get_all_tipo_transacciones']);


    Route::get('/get-ultimos-registros',[RegistroController::class,'get_ultimos_registros']);
    Route::post('/get-registros-filtro',[RegistroController::class,'get_registros_filtro']);
    Route::get('/get-total-registros-for-categoria',[RegistroController::class,'get_total_registros_for_categoria']);
    Route::post('/get-info-resumen-financiero',[InfoFinacieroController::class,'get_info_resumen_financiero']);


    Route::get('/get-registros-mes-actual',[RegistroController::class,'get_registros_mes_actual']);
 
    Route::post('/add-new-registro',[RegistroController::class,'add_registro']);
    Route::post('/update-registro',[RegistroController::class,'update_registro']);
    Route::delete('/delete-registro/{id}',[RegistroController::class,'delete_registro']);



    //RUtas de admin
    Route::get('/get-list-users-for-admin',[GestionUsersController::class,'get_list_users']);
    Route::post('/add-new-user',[GestionUsersController::class,'add_new_user']);
    Route::post('/update-user',[GestionUsersController::class,'update_user']);
    
});
