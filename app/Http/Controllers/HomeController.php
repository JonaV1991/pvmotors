<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return voidf
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.admin');
    }
    public function indexPerfilUser()
    {
        return view('admin.perfil_user');
    }
    public function indexPerfilCliente()
    {
        return view('admin.clientes');
    }
    public function indexPerfilDashboard()
    {
        return view('admin.dashboard');
    }
    public function indexPerfilInventario()
    {
        return view('admin.inventario');
    }
    public function indexPerfilCotzaciones()
    {
        return view('admin.cotizaciones');
    }
    public function indexPerfilCotizar()
    {
        return view('admin.user_cotizar');
    }
    public function indexPerfilServicios()
    {
        return view('admin.servicios');
    }
    public function indexPerfilContactos()
    {
        return view('admin.contactos');
    }
    public function indexPerfilPedidos()
    {
        return view('admin.pedidos');
    }
}
