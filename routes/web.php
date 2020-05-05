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

Route::get('/', function () {
    return view('welcome');
});
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//reset password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//email verification
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//ruta del home admin.admin
Route::get('/admin/admin', 'HomeController@index')->name('home');
//rutas de los NAVS del sistema
Route::get('admin/perfil_user', 'HomeController@indexPerfilUser')->name('perfil_user');
Route::get('admin/clientes', 'HomeController@indexPerfilCliente')->name('perfil_cliente');
Route::get('admin/dashboard', 'HomeController@indexPerfilDashboard')->name('dashboard');
Route::get('admin/inventario', 'HomeController@indexPerfilInventario')->name('inventario');
Route::get('admin/cotizaciones', 'HomeController@indexPerfilCotzaciones')->name('cotizaciones');
Route::get('admin/user_cotizar', 'HomeController@indexPerfilCotizar')->name('cotizar');
Route::get('admin/tienda', 'HomeController@indexPerfilTienda')->name('tienda');
Route::get('admin/servicios', 'HomeController@indexPerfilServicios')->name('servicios');
Route::get('admin/contactos', 'HomeController@indexPerfilContactos')->name('contactos');
Route::post('admin/contactos', 'CorreosController@correo_contacto')->name('sendmail');
Route::post('admin/user_cotizar', 'CorreosController@correo_cotizacion')->name('sendcotizacion');
Route::get('admin/pedidos', 'HomeController@indexPerfilPedidos')->name('pedidos');
