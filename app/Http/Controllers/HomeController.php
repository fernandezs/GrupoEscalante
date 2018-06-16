<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Articulo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Reparacion;
use App\Models\Proveedor;
use App\Models\Deuda;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $articulos = Articulo::count();
        $reparaciones = Reparacion::count();
        $clientes = Cliente::count();
        $users = User::count();
        $listaArticulos = Articulo::orderBy('created_at')->take(10)->get();
        $listaReparaciones = Reparacion::orderBy('created_at')->take(10)->get();
        return view('adminlte::home', compact('articulos','users','clientes','reparaciones','listaArticulos','listaReparaciones'));
    }
}