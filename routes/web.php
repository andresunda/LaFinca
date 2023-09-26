<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Auth;


use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;



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
//INDEX FRONT END EN CONJUNTOS CON LOS PRODUCTOS
Route::get('/', [UsuariosController::class, 'index']);


//TERMOMETRO
Route::get('/sensorHorno', function () {
    return view('sensorHorno');
});
//VISTA DE LOS PRODUCTOS (MENU DE LA PIZZERIA)
Route::get('menu', [ProductosController::class, 'menu'])->name('menu');

//GENERADOR DE TICKETS PDF

Route::get('/crearticket/{id}', [PedidosController::class, 'crearticket'])->name('crearticket');

//VISTA MODIFICAR CUENTA
Route::get('/cuenta', [UsuariosController::class, 'cuenta'])->name('cuenta');



Route::get('/modificarCuentaVista/{id}', function ($id) {
    $usuario =  User::find($id);
    return view('modificarCuentaVista')->with('usuario', $usuario);
})->name('modificarCuentaVista');

Route::post('/modificarCuenta', [UsuariosController::class, 'modificarCuenta'])->name('modificarCuenta');

//============================================================================================================================================================

//=====================================================================INCIO DE SESION ====================================================================
Route::post('/login', [UsuariosController::class, 'login'])->name('login');

Route::get('/inicioSesion', function () {
    return view('inicioSesion');
})->name('inicioSesion');

//**************************************************************FUNCION PARA CERRAR LA SESION********************************************************
Route::get('/logout', function () {
    Auth::logout();
    return view('inicioSesion');
})->name('logout');




//=======================================================================//CLIENTES=======================================================
Route::get('/clientes', [ClientesController::class, 'clientes'])->name('clientes');

Route::get('/agregarClienteVista', function () {
    return view('agregarClienteVista');
})->name('agregarClienteVista');

Route::post('/agregarCliente', [ClientesController::class, 'agregarCliente'])->name('agregarCliente');

//VISTA MODIFICAR
Route::get('/modificarClienteVista/{id}', function ($id) {
    $cliente =  Cliente::find($id);
    return view('modificarClienteVista')->with('cliente', $cliente);
})->name('modificarClienteVista');

Route::post('/modificarCliente', [ClientesController::class, 'modificarCliente'])->name('modificarCliente');

Route::get('/eliminarCliente/{id}',[ClientesController::class, 'eliminarCliente'])->name('eliminarCliente');

//======================================================================================================================================

//========================================================VENTAS====================================================================//

Route::get('/ventas', [VentasController::class, 'ventas'])->name('ventas');




//=================================================================PEDIDOS=========================================================//
Route::get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos');

Route::get('/agregarPedidoVista/{id}', function ($id) {
    return view('agregarPedidoVista')->with('id', $id);
})->name('agregarPedidoVista');

Route::post('/agregarPedido', [PedidosController::class, 'agregarPedido'])->name('agregarPedido');

//BUSCADOR DE USUARIOS
Route::get('/usuarios/search', [UsuariosController::class, 'buscarUsuarios']);
//BUSCADOR DE PRODUCTOS
Route::get('/productos/search', [ProductosController::class, 'buscarProductos']);
//BUSCADOR DE CLIENTES
Route::get('/clientes/search', [ClientesController::class, 'buscarClientes']);
//BUSCADOR DE PEDIDOS
Route::get('/pedidos/search', [PedidosController::class, 'buscarPedidos']);


Route::post('/cambiar_statuspedido/{id}', [PedidosController::class, 'cambiar_statuspedido'])->name('cambiar_statuspedido');


Route::group(['middleware' => 'admininistrador'], function () {

    Route::get('/panel_administrativo', function () {
        $nusuario = User::whereHas('autentificacion', function ($query) {
            $query->where('rol', 1);
        })->count();


        $npedidos = Pedido::all()->count();
        $nproductos = Producto::all()->count();
        $nclientes = Cliente::all()->count();

        return view('panel_administrativo', compact('nusuario', 'npedidos', 'nproductos', 'nclientes'));
    })->name('panel_administrativo');


    Route::get('/modificarPedidoVista/{id}', function ($id) {
        $pedido =  Pedido::find($id);
        return view('modificarPedidoVista')->with('pedido', $pedido);
    })->name('modificarPedidoVista');

    Route::post('/modificarPedido', [PedidosController::class, 'modificarPedido'])->name('modificarPedido');


    Route::get('/eliminarPedido/{id}',[PedidosController::class, 'eliminarPedido'])->name('eliminarPedido');

//========================================================================USUARIOS================================================================================
Route::get('/usuarios', [UsuariosController::class, 'usuarios'])->name('usuarios');

Route::get('/agregarUsuarioVista', function () {
    return view('agregarUsuarioVista');
})->name('agregarUsuarioVista');

Route::post('/agregarUsuario', [UsuariosController::class, 'agregarUsuario'])->name('agregarUsuario');

//VISTA MODIFICAR
Route::get('/modificarUsuarioVista/{id}', function ($id) {
    $usuario =  User::find($id);
    return view('modificarUsuarioVista')->with('usuario', $usuario);
})->name('modificarUsuarioVista');

Route::post('/modificarUsuario', [UsuariosController::class, 'modificarUsuario'])->name('modificarUsuario');

Route::get('/eliminarUsuario/{id}',[UsuariosController::class, 'eliminarUsuario'])->name('eliminarUsuario');

//RUTA VISTA/MOSTRAR ACTIVIDADES GUARDIA
Route::get('/actividades', [UsuariosController::class, 'actividades'])->name('actividades');

//=======================================================================PRODUCTOS==========================================================================
Route::get('/productos', [ProductosController::class, 'productos'])->name('productos');

//RUTA PARA LA VISTA FORMULARIO AGREGAR PRODUCTOS
Route::get('/agregarProductoVista', function () {
    return view('agregarProductoVista');
})->name('agregarProductoVista');

//RUTA PARA LA FUNCION DE AGREGAR PRODUCTOS
Route::post('/agregarProductos', [ProductosController::class, 'agregarProductos'])->name('agregarProductos');


//VISTA MODIFICAR PRODUCTOS DEL MENU
Route::get('/modificarProductoVista/{id}', function ($id) {
    $producto = Producto::find($id);
    return view('modificarProductoVista')->with('producto', $producto);
})->name('modificarProductoVista');

//RUTA PARA LA FUNCION MODIFICAR EL PRODUCTO
Route::post('/modificarProducto', [ProductosController::class, 'modificarProducto'])->name('modificarProducto');

//RUTA PARA LA FUNCION ELIMINAR PRODUCTOS
Route::get('/eliminarProducto/{id}', [ProductosController::class, 'eliminarProducto'])->name('eliminarProducto');
//============================================================================================================================================================


});

