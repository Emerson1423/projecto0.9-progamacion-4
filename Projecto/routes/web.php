<?php



use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\sesion\LoginController;
use App\Http\Controllers\sesion\registroController;
use App\Http\Controllers\juego\JuegosController;
use App\Http\Controllers\categoria\CategoriasController;
use App\Http\Controllers\plataforma\PlataformasController;
use App\Http\Controllers\proveedor\ProveedoresController;
use App\Http\Controllers\compra\compraController;
use App\Http\Controllers\usuario\usuariosController;
use App\Http\Controllers\rol\RolesController;
use App\Http\Controllers\orden\OrdenesController;
use App\Http\Controllers\pago\pagosController;
use App\Http\Controllers\pedido\pedidosController;
use App\Http\Controllers\vistaJuegos\ViewjuegosController;

//ruta de inicio 
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Ruta para la página de administración

Route::get('/admin', function () {
    return view('administracion.admin');
})->middleware([CheckRole::class . ':admin'])->name('admin');

// Página de (formulario de login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


// Procesar login (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


// Cerrar sesión
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



// Registro de usuarios
Route::get('/registro/crar', [registroController::class, 'create'])->name('registro.create');
Route::post('/registro', [registroController::class, 'store'])->name('registro.store');

// Ruta después de iniciar sesión Órdenes vista cliente compra
Route::prefix('compra')->middleware([CheckRole::class . ':cliente'])->group(function(){
Route::get('/compra/create', [compraController::class, 'create'])->name('compra.create');
Route::post('/compra', [compraController::class, 'store'])->name('compra.store'); //tenia ordenes.store
Route::get('/compra', [compraController::class, 'index'])->name('compra.index'); //tenia ordenes.index
});

// Ruta para la página de inicio después de iniciar sesión

//ruta para ver los juegos disponibles en inicio
Route::get('/juegos', [viewjuegosController::class, 'index'])->name('juegos');




Route::prefix('usuario')->group(function() {
Route::get('/usuarios', [usuariosController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [usuariosController::class, 'create'])->name('usuarios.crear');
Route::post('/usuarios/guardar', [usuariosController::class, 'guardar'])->name('usuarios.guardar');
Route::get('/usuarios/editar/{id}', [usuariosController::class, 'editar'])->name('usuarios.editar');
Route::put('/usuarios/actualizar/{id}', [usuariosController::class, 'actualizar'])->name('usuarios.actualizar');
Route::delete('/usuarios/eliminar/{id}', [usuariosController::class, 'eliminar'])->name('usuarios.eliminar');
});

Route::prefix('orden')->group(function() {
Route::get('/ordenes', [OrdenesController::class, 'index'])->name('ordenes.index');
Route::get('/ordenes/create', [OrdenesController::class, 'create'])->name('ordenes.create');
Route::post('/ordenes', [OrdenesController::class, 'store'])->name('ordenes.store');
Route::get('/ordenes/{id}/edit', [OrdenesController::class, 'edit'])->name('ordenes.edit');
Route::put('/ordenes/{id}', [OrdenesController::class, 'update'])->name('ordenes.update');
Route::delete('/ordenes/{id}', [OrdenesController::class, 'destroy'])->name('ordenes.destroy');
});
Route::prefix('rol')->group(function() {
Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
});

Route::prefix('pedido')->group(function() {
Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/create', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidosController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{id}/edit', [PedidosController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{id}', [PedidosController::class, 'update'])->name('pedidos.update');
Route::delete('/pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');

});

Route::prefix('pago')->middleware([CheckRole::class . ':cliente'])->group(function() {
Route::get('/pagos', [PagosController::class, 'index'])->name('pagos.index');
Route::get('/pagos/create', [PagosController::class, 'create'])->name('pagos.create');
Route::post('/pagos', [PagosController::class, 'store'])->name('pagos.store');
Route::get('/pagos/{id}/edit', [PagosController::class, 'edit'])->name('pagos.edit');
Route::put('/pagos/{id}', [PagosController::class, 'update'])->name('pagos.update');
Route::delete('/pagos/{id}', [PagosController::class, 'destroy'])->name('pagos.destroy');
});


Route::prefix('juego')->middleware(['auth', CheckRole::class . ':admin'])->group(function() {
Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
Route::get('/juegos/crear', [JuegosController::class, 'create'])->name('juegos.crear');
Route::post('/juegos/guardar', [JuegosController::class, 'guardar'])->name('juegos.guardar');
Route::get('/juegos/editar/{id}', [JuegosController::class, 'editar'])->name('juegos.editar');
Route::put('/juegos/actualizar/{id}', [JuegosController::class, 'actualizar'])->name('juegos.actualizar');
Route::delete('/juegos/eliminar/{id}', [JuegosController::class, 'eliminar'])->name('juegos.eliminar');
});



Route::prefix('categorias')->middleware(['auth', CheckRole::class . ':admin'])->group(function(){
Route::get('/categoria', [CategoriasController::class, 'index'])->name('caindex');
Route::get('/categoria/crear', [CategoriasController::class, 'create']) ->name('caCrear');
Route::post('/categoria/guardar', [CategoriasController::class, 'guardar']) ->name('caGuardar');
Route::get('/categoria/editar/{id}', [CategoriasController::class, 'editar']) ->name('caEditar');
Route::put('/categoria/editar/{id}', [CategoriasController::class, 'actualizar']) ->name('caActualizar');
Route::delete('/categoria/eliminar/{id}', [CategoriasController::class, 'eliminar']) ->name('caEliminar');

});

Route::prefix('plataforma')->middleware(['auth',CheckRole::class . ':admin'])->group(function(){
Route::get('/plataformas', [PlataformasController::class, 'index'])->name('plaindex');
Route::get('/plataformas/crear', [PlataformasController::class, 'create']) ->name('plaCrear');
Route::post('/plataformas/guardar', [PlataformasController::class, 'guardar']) ->name('plaGuardar');
Route::get('/plataformas/editar/{id}', [PlataformasController::class, 'editar']) ->name('plaEditar');
Route::put('/plataformas/editar/{id}', [PlataformasController::class, 'actualizar']) ->name('plaActualizar');
Route::delete('/plataformas/eliminar/{id}', [PlataformasController::class, 'eliminar']) ->name('plaEliminar');
});

Route::prefix('proveedores')->middleware(['auth',CheckRole::class . ':admin'])->group(function(){
Route::get('/proveedor', [ProveedoresController::class, 'index'])->name('proindex');
Route::get('/proveedor/crear', [ProveedoresController::class, 'create']) ->name('proCrear');
Route::post('/proveedor/guardar', [ProveedoresController::class, 'guardar']) ->name('proGuardar');
Route::get('/proveedor/editar/{id}', [ProveedoresController::class, 'editar']) ->name('proEditar');
Route::put('/proveedor/editar/{id}', [ProveedoresController::class, 'actualizar']) ->name('proActualizar');
Route::delete('/proveedor/eliminar/{id}', [ProveedoresController::class, 'eliminar']) ->name('proEliminar');

});
