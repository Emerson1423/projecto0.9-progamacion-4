<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sesion\LoginController;
use App\Http\Controllers\sesion\RegistroController;
use App\Http\Controllers\juego\JuegosController;
use App\Http\Controllers\categoria\CategoriasController;
use App\Http\Controllers\plataforma\PlataformasController;
use App\Http\Controllers\proveedor\ProveedoresController;
use App\Http\Controllers\compra\CompraController;
use App\Http\Controllers\usuario\UsuariosController;
use App\Http\Controllers\rol\RolesController;
use App\Http\Controllers\Orden\OrdenesController;
use App\Http\Controllers\pago\PagosController;
use App\Http\Controllers\pedido\PedidosController;
use App\Http\Controllers\vistaJuegos\ViewjuegosController;

// Ruta de Inicio / Landing Page (Acceso Libre)
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Ruta para el Panel de Administración (Acceso Directo Libre para Demostración)
Route::get('/admin', function () {
    // Si no hay usuario logueado, forzamos la sesión como Admin de demostración
    if (!auth()->check()) {
        $adminUser = \App\Models\Usuario::where('rol_Id', 2)->first();
        if ($adminUser) {
            auth()->login($adminUser);
        }
    }
    return view('administracion.admin');
})->name('admin');

// Rutas de inicio de sesión y registro
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registro/crar', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

// Rutas de Cotización y Compras del Cliente (Acceso Directo Libre)
Route::prefix('compras')->group(function(){
    Route::get('/compras/create', [CompraController::class, 'create'])->name('compras.create');
    Route::post('/compras/store', [CompraController::class, 'store'])->name('compras.store');
    Route::get('/compras/index', [CompraController::class, 'index'])->name('compras.index');
    Route::get('/historial-compras', [CompraController::class, 'historial'])->name('compras.historial');
    Route::get('/descargar/{ordenId}', [CompraController::class, 'descargarFactura'])->name('compras.descargar');
});

// Catálogo de Servicios
Route::get('/juegos', [ViewjuegosController::class, 'index'])->name('juegos');

// Gestión de Usuarios y Roles (Acceso Directo Libre)
Route::prefix('usuario')->group(function() {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/crear', [UsuariosController::class, 'create'])->name('usuarios.crear');
    Route::post('/usuarios/guardar', [UsuariosController::class, 'guardar'])->name('usuarios.guardar');
    Route::get('/usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('usuarios.editar');
    Route::put('/usuarios/actualizar/{id}', [UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');
    Route::delete('/usuarios/eliminar/{id}', [UsuariosController::class, 'eliminar'])->name('usuarios.eliminar');
});

// Gestión de Órdenes
Route::prefix('orden')->group(function() {
    Route::get('/ordenes', [OrdenesController::class, 'index'])->name('ordenes.index');
    Route::get('/ordenes/create', [OrdenesController::class, 'create'])->name('ordenes.create');
    Route::post('/ordenes', [OrdenesController::class, 'store'])->name('ordenes.store');
    Route::get('/ordenes/{id}/edit', [OrdenesController::class, 'edit'])->name('ordenes.edit');
    Route::put('/ordenes/{id}', [OrdenesController::class, 'update'])->name('ordenes.update');
    Route::delete('/ordenes/{id}', [OrdenesController::class, 'destroy'])->name('ordenes.destroy');
});

// Gestión de Roles
Route::prefix('rol')->group(function() {
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
});

// Gestión de Pedidos
Route::prefix('pedido')->group(function() {
    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/create', [PedidosController::class, 'create'])->name('pedidos.create');
    Route::post('/pedidos', [PedidosController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos/{id}/edit', [PedidosController::class, 'edit'])->name('pedidos.edit');
    Route::put('/pedidos/{id}', [PedidosController::class, 'update'])->name('pedidos.update');
    Route::delete('/pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');
});

// Gestión de Pagos
Route::prefix('pago')->group(function() {
    Route::get('/pagos', [PagosController::class, 'index'])->name('pagos.index');
    Route::get('/pagos/create', [PagosController::class, 'create'])->name('pagos.create');
    Route::post('/pagos', [PagosController::class, 'store'])->name('pagos.store');
    Route::get('/pagos/{id}/edit', [PagosController::class, 'edit'])->name('pagos.edit');
    Route::put('/pagos/{id}', [PagosController::class, 'update'])->name('pagos.update');
    Route::delete('/pagos/{id}', [PagosController::class, 'destroy'])->name('pagos.destroy');
});

// CRUD Servicios (Juegos)
Route::prefix('juego')->group(function() {
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
    Route::get('/juegos/crear', [JuegosController::class, 'create'])->name('juegos.crear');
    Route::post('/juegos/guardar', [JuegosController::class, 'guardar'])->name('juegos.guardar');
    Route::get('/juegos/editar/{id}', [JuegosController::class, 'editar'])->name('juegos.editar');
    Route::put('/juegos/actualizar/{id}', [JuegosController::class, 'actualizar'])->name('juegos.actualizar');
    Route::delete('/juegos/eliminar/{id}', [JuegosController::class, 'eliminar'])->name('juegos.eliminar');
});

// CRUD Categorías
Route::prefix('categorias')->group(function(){
    Route::get('/categoria', [CategoriasController::class, 'index'])->name('caindex');
    Route::get('/categoria/crear', [CategoriasController::class, 'create'])->name('caCrear');
    Route::post('/categoria/guardar', [CategoriasController::class, 'guardar'])->name('caGuardar');
    Route::get('/categoria/editar/{id}', [CategoriasController::class, 'editar'])->name('caEditar');
    Route::put('/categoria/editar/{id}', [CategoriasController::class, 'actualizar'])->name('caActualizar');
    Route::delete('/categoria/eliminar/{id}', [CategoriasController::class, 'eliminar'])->name('caEliminar');
});

// CRUD Plataformas
Route::prefix('plataforma')->group(function(){
    Route::get('/plataformas', [PlataformasController::class, 'index'])->name('plaindex');
    Route::get('/plataformas/crear', [PlataformasController::class, 'create'])->name('plaCrear');
    Route::post('/plataformas/guardar', [PlataformasController::class, 'guardar'])->name('plaGuardar');
    Route::get('/plataformas/editar/{id}', [PlataformasController::class, 'editar'])->name('plaEditar');
    Route::put('/plataformas/editar/{id}', [PlataformasController::class, 'actualizar'])->name('plaActualizar');
    Route::delete('/plataformas/eliminar/{id}', [PlataformasController::class, 'eliminar'])->name('plaEliminar');
});

// CRUD Sedes Corporativas (Proveedores)
Route::prefix('proveedores')->group(function(){
    Route::get('/proveedor', [ProveedoresController::class, 'index'])->name('proindex');
    Route::get('/proveedor/crear', [ProveedoresController::class, 'create'])->name('proCrear');
    Route::post('/proveedor/guardar', [ProveedoresController::class, 'guardar'])->name('proGuardar');
    Route::get('/proveedor/editar/{id}', [ProveedoresController::class, 'editar'])->name('proEditar');
    Route::put('/proveedor/editar/{id}', [ProveedoresController::class, 'actualizar'])->name('proActualizar');
    Route::delete('/proveedor/eliminar/{id}', [ProveedoresController::class, 'eliminar'])->name('proEliminar');
});

Route::post('/limpiar-factura-session', function () {
    session()->forget('factura_blob');
    return response()->noContent();
})->name('factura.limpiar');
