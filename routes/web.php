<?php

use App\Http\Controllers\Fotografo\misPaquetes as misPaquetesFotografo;
use App\Http\Controllers\Fotografo\home as fotografoHome;
use App\Http\Controllers\Fotografo\solicitudes as solicitudesFotografo;
use App\Http\Controllers\Organizador\home as organizadorHome;
use App\Http\Controllers\Organizador\misEventos as organizadorMisEventos;
use App\Http\Controllers\Usuario\Paquete;
use App\Http\Controllers\Usuario\perfil as UsuarioPerfil;
use Illuminate\Support\Facades\Route;
use App\Models\paquete as paque;
use App\Http\Controllers\Cliente\home as clienteHome;
use App\Http\Controllers\Usuario\qr;

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
})->name('welcome');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'administrador') {
            return view('administrador.home');
        } else {
            if (auth()->user()->getRoleNames()[0] == 'cliente') {
                return redirect()->route('cliente.home');
            } else {
                if (auth()->user()->getRoleNames()[0] == 'fotografo') {
                    return redirect()->route('fotografo.home');
                } else {
                    if (auth()->user()->getRoleNames()[0] == 'organizador') {
                        return redirect()->route('organizador.home');
                    }
                }
            }
        }
    })->name('dashboard');

    ////////////demas RUTAS///////////////////////////////

    ////////////////////////////
    /////  Subscripcion  ///////
    ////////////////////////////
    Route::get('/suscripcion/vista/{id}', [Paquete::class, 'vistaPago'])->name('paquete.vistaPago');
    Route::get('/guardarTarjetaC/{id}', [Paquete::class, 'guardarTarjetaC'])->name('paquete.guardarTarjetaC');
    Route::get('/dash/{id}', [Paquete::class, 'UsuarioEscogeRol'])->name('paquete.escogePaquete');

    ////////////////////////////
    ////////  Fotografo  ///////
    ////////////////////////////

    //Perfil
    Route::get('/Fotografo/home', [fotografoHome::class, 'index'])->name('fotografo.home');

    //mis paquetes
    Route::get('/Fotografo/mis-paquetes/index', [misPaquetesFotografo::class, 'index'])->name('Fotografo.mis-paquetes.index');

    //solicitudes
    Route::get('/Fotografo/solicitud/{idnoti}', [solicitudesFotografo::class, 'solicitud'])->name('Fotografo.solicitud');
    Route::get('/Fotografo/Catalogos', [fotografoHome::class, 'catalogos'])->name('Fotografo.catalogos');
    Route::get('/Fotografo/Catalogos/vista/{id}', [fotografoHome::class, 'vistaFotos'])->name('Fotografo.vista-fotos');

    Route::post('/Fotografo/eliminar/fotos/{id}', [fotografoHome::class, 'eliminarFotos'])->name('Fotografo.eliminar-fotos');

    Route::get('/Fotografo/Catalogo/detalle/venta/{id}', [fotografoHome::class, 'detallesVenta'])->name('Fotografo.detalle-ventas');
    


    ////////////////////////////
    ////////  Organizador  /////
    ////////////////////////////
    Route::get('/organizador/home', [organizadorHome::class, 'index'])->name('organizador.home');
    Route::get('/organizador/MisEventos', [organizadorMisEventos::class, 'index'])->name('organizador.misEventos.index');
    Route::get('/organizador/MisEventos/{id}/tablaDeFotografos', [organizadorMisEventos::class, 'tablaFotografos'])->name('organizador.misEventos.tablafotografos');
    Route::get('/organizador/MisEventos/{id}/listaDeSolicitudes', [organizadorMisEventos::class, 'listaSolicitudes'])->name('organizador.misEventos.listaSolicitudes');
    Route::get('/organizador/MisEventos/{id}/catalogo', [organizadorMisEventos::class, 'catalogo'])->name('organizador.misEventos.catalogo');
    Route::get('/organizador/descargar/fotos/{id}', [organizadorHome::class, 'descargarFotos'])->name('organizador.descargar-fotos');

    ////////////////////////////
    ////////  Todos  ///////////
    ////////////////////////////
    Route::get('/Catalogos', [Paquete::class, 'catalogos'])->name('usuarios.catalogos');
    Route::get('/Catalogo/{id}', [Paquete::class, 'catalogoVista'])->name('usuarios.catalogo-vista');

    Route::get('/Catalogo/porqr/{id}', [Paquete::class, 'catalogoPorQr'])->name('usuarios.catalogo-qr');

    Route::get('/eventos/fotos/compradas', [Paquete::class, 'eventosFotosCompradas'])->name('usuarios.eventos-fotos-compradas');
    Route::get('/eventos/fotos/lista/compradas/{id}', [Paquete::class, 'listaFotosCompradas'])->name('usuarios.lista-fotos-compradas');

    Route::get('/eventos/apareces/foto/{id}', [Paquete::class, 'aparecesFoto'])->name('usuarios.apareces-foto');
    Route::get('/escanear/qr', [qr::class, 'escanearqr'])->name('usuarios.escanear-qr');


    //cliente
    Route::get('/cliente/home', [clienteHome::class, 'index'])->name('cliente.home');


    
    //perfil

    Route::get('/usuario/perfil', [UsuarioPerfil::class, 'perfil'])->name('usuarios.perfil');
    Route::post('/usuario/cambiarFoto', [UsuarioPerfil::class, 'cambiarFoto'])->name('usuarios.cambiar-foto');





});


Route::get('/face', function () {
    return view('pruebas.facea');
})->name('pruebas.prueba');

Route::get('/notificacion', function () {
    return view('pruebas.notificacion');
})->name('pruebas.notificacion');
