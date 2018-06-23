<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});


Route::resource('categorias', 'CategoriaAPIController');

Route::resource('marcas', 'MarcaAPIController');

Route::resource('proveedores', 'ProveedorAPIController');

Route::resource('empleados', 'EmpleadoAPIController');

Route::resource('clientes', 'ClienteAPIController');

Route::resource('articulos', 'ArticuloAPIController');

Route::resource('deudas', 'DeudaAPIController');

Route::resource('detalle_deudas', 'DetalleDeudaAPIController');


Route::resource('estados', 'EstadoAPIController');

Route::resource('reparaciones', 'ReparacionAPIController');

Route::resource('estado_reparacion', 'EstadoReparacionAPIController');

Route::resource('notas', 'NotaAPIController');

Route::resource('notas', 'NotaAPIController');