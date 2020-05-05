<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;

class CorreosController extends Controller
{
    //función para enviar correo de contactos
    public function correo_contacto(Request $request)
    {
    	$resultado = Mail::send('emails.contactos',$request->all(),function($msj){
    		$msj->subject('Correo de contacto');
    		$msj->to('pad_clan7@hotmail.com');
    	});
    	Session::flash('message','Mensaje enviado correctamente a P&V MOTORS, pronto se comunicarán.');
    	return view('admin.contactos');
    }

    //función para enviar correo de contactos
    public function correo_cotizacion(Request $request)
    {
    	$resultado = Mail::send('emails.cotizacion_user',$request->all(),function($msj){
    		$msj->subject('Nueva Cotización');
    		$msj->to('pad_clan7@hotmail.com');
    	});
    	Session::flash('message','Tu cotización fue enviada correctamente a P&V MOTORS, pronto se comunicarán.');
    	return view('admin.user_cotizar');
    }
}
