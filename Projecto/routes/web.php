<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sesion\LoginController;
use App\Http\Controllers\sesion\registroController;
use App\Http\Controllers\juego\JuegosController;
use App\Http\Controllers\categoria\CategoriasController;
use App\Http\Controllers\plataforma\PlataformasController;
use App\Http\Controllers\proveedor\ProveedoresController;
use App\Http\Controllers\compra\compraController;


Route::get('/admin', function () {
    return view('administracion.admin');
}) ->name('admin');
// Página de inicio (formulario de login)
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');


// Procesar login (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


// Cerrar sesión
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



// Registro de usuarios
Route::get('/registro/crar', [registroController::class, 'create'])->name('registro.create');
Route::post('/registro', [registroController::class, 'store'])->name('registro.store');

// Órdenes
Route::get('/ordenes/create', [compraController::class, 'create'])->name('ordenes.create');
Route::post('/ordenes', [compraController::class, 'store'])->name('ordenes.store'); 
Route::get('/ordenes', [compraController::class, 'index'])->name('ordenes.index');

// Ruta para la página de inicio después de iniciar sesión

// En routes/web.php
Route::prefix('juego')->group(function() {
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
    Route::get('/juegos/crear', [JuegosController::class, 'create'])->name('juegos.crear');
    Route::post('/juegos/guardar', [JuegosController::class, 'guardar'])->name('juegos.guardar');
    Route::get('/juegos/editar/{id}', [JuegosController::class, 'editar'])->name('juegos.editar');
    Route::put('/juegos/actualizar/{id}', [JuegosController::class, 'actualizar'])->name('juegos.actualizar');
    Route::delete('/juegos/eliminar/{id}', [JuegosController::class, 'eliminar'])->name('juegos.eliminar');
});



Route::prefix('categorias')->group(function(){
Route::get('/categoria', [CategoriasController::class, 'index'])->name('caindex');
Route::get('/categoria/crear', [CategoriasController::class, 'create']) ->name('caCrear');
Route::post('/categoria/guardar', [CategoriasController::class, 'guardar']) ->name('caGuardar');
Route::get('/categoria/editar/{id}', [CategoriasController::class, 'editar']) ->name('caEditar');
Route::put('/categoria/editar/{id}', [CategoriasController::class, 'actualizar']) ->name('caActualizar');
Route::delete('/categoria/eliminar/{id}', [CategoriasController::class, 'eliminar']) ->name('caEliminar');

});

Route::prefix('plataforma')->group(function(){
Route::get('/plataformas', [PlataformasController::class, 'index'])->name('plaindex');
Route::get('/plataformas/crear', [PlataformasController::class, 'create']) ->name('plaCrear');
Route::post('/plataformas/guardar', [PlataformasController::class, 'guardar']) ->name('plaGuardar');
Route::get('/plataformas/editar/{id}', [PlataformasController::class, 'editar']) ->name('plaEditar');
Route::put('/plataformas/editar/{id}', [PlataformasController::class, 'actualizar']) ->name('plaActualizar');
Route::delete('/plataformas/eliminar/{id}', [PlataformasController::class, 'eliminar']) ->name('plaEliminar');
});

Route::prefix('proveedores')->group(function(){
Route::get('/proveedor', [ProveedoresController::class, 'index'])->name('proindex');
Route::get('/proveedor/crear', [ProveedoresController::class, 'create']) ->name('proCrear');
Route::post('/proveedor/guardar', [ProveedoresController::class, 'guardar']) ->name('proGuardar');
Route::get('/proveedor/editar/{id}', [ProveedoresController::class, 'editar']) ->name('proEditar');
Route::put('/proveedor/editar/{id}', [ProveedoresController::class, 'actualizar']) ->name('proActualizar');
Route::delete('/proveedor/eliminar/{id}', [ProveedoresController::class, 'eliminar']) ->name('proEliminar');

});
