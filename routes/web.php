<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('empleados', 'EmpleadoController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('marcas', 'MarcaController');
    Route::resource('proveedores', 'ProveedorController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('articulos', 'ArticuloController');
    Route::resource('deudas', 'DeudaController');
    Route::get('deudas/{deuda}/revision', 'DeudaController@revision')->name('deudas.revision');
    Route::resource('detalleDeudas', 'DetalleDeudaController');
    Route::get('detalle_deudas/deuda/{id}', 'DetalleDeudaController@detallesByDeudaID');
    Route::resource('estados', 'EstadoController');
    Route::resource('reparaciones', 'ReparacionController');
    Route::get('reparaciones/revision/{id}', 'ReparacionController@revision')->name('reparaciones.revision');
    
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::resource('estadoReparacion', 'EstadoReparacionController');

Route::get('user/profile/{user}', 'UserController@editProfile')->name('user.edit.profile');;
Route::patch('user/profile/{user}', 'UserController@updateProfile')->name('user.update.profile');;

Route::resource('admin/configurations', 'ConfigurationController');
Route::resource('admin/rols', 'RolController');
Route::resource('admin/users', 'UserController');
Route::get('/admin/user/{user}/menu', 'UserController@menu')->name('user.menu');;
Route::patch('/admin/user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

Route::get('/admin/option/create/{padre}', 'OptionMenuController@create');
Route::get('/admin/option/orden', 'OptionMenuController@updateOrden');
Route::post('/admin/option/orden', 'OptionMenuController@updateOrden');
Route::resource('/admin/option',"OptionMenuController");
Route::resource('/catalogos', 'CatalogoController')->except('edit','update');
Route::get('prueba/pdf', function (\App\Extensiones\Fpdf $fpdf) {
    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit();
});

Route::get('proveedores/catalogos/{id}', 'ProveedorController@catalogos')->name('proveedores.catalogos');

Route::resource('detalleReparacion', 'DetalleReparacionController');
Route::get('deuda/pdf/{id}', 'PdfController@invoice')->name('pdf.invoice');