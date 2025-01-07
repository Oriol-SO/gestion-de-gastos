<?php

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/registros',[RegistroController::class,'get_registros']);

Route::post('/add-new-registro',[RegistroController::class,'add_registro']);
Route::post('/update-registro',[RegistroController::class,'update_registro']);
route::delete('/delete-registro/{id}',[RegistroController::class,'delete_registro']);