<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    //
    public function indexPerfilCliente()
    {
    	$clientes = Cliente::all();
    	return view('admin.clientes',compact('clientes')); 
    }
}
