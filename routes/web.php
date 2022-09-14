<?php

use Illuminate\Support\Facades\Route;


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
    //return view('welcome');
    return redirect()->route('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('administradores', [App\Http\Controllers\UserController::class, 'index_administrador'])->name('administradores.index_administrador');
    Route::get('/administradores/create', [App\Http\Controllers\UserController::class, 'create_administrador'])->name('administradores.create_administrador');
    Route::post('/administradores', [App\Http\Controllers\UserController::class, 'store_administrador'])->name('administradores.store_administrador');
    Route::get('administradores/{user}', [App\Http\Controllers\UserController::class, 'show_administrador'])->name('administradores.show_administrador');
    Route::get('administradores/{user}/edit', [App\Http\Controllers\UserController::class, 'edit_administrador'])->name('administradores.edit_administrador');
    Route::put('administradores/{user}', [App\Http\Controllers\UserController::class, 'update_administrador'])->name('administradores.update_administrador');
    Route::get('referentes', [App\Http\Controllers\UserController::class, 'index_referente'])->name('referentes.index_referente');
    Route::get('/referentes/create', [App\Http\Controllers\UserController::class, 'create_referente'])->name('referentes.create_referente');
    Route::post('/referentes', [App\Http\Controllers\UserController::class, 'store_referente'])->name('referentes.store_referente');
    Route::get('referentes/{user}', [App\Http\Controllers\UserController::class, 'show_referente'])->name('referentes.show_referente');
    Route::get('referentes/{user}/edit', [App\Http\Controllers\UserController::class, 'edit_referente'])->name('referentes.edit_referente');
    Route::put('referentes/{user}', [App\Http\Controllers\UserController::class, 'update_referente'])->name('referentes.update_referente');
    Route::get('files/{uuid}/download', [App\Http\Controllers\FilesController::class, 'download'])->name('files.download');
    Route::resource('contratos.files', App\Http\Controllers\FilesController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('establecimiento', App\Http\Controllers\EstablecimientoController::class);
    Route::resource('proveedor', App\Http\Controllers\ProveedorController::class);
    Route::resource('direccion', App\Http\Controllers\DireccionController::class);
    Route::resource('convenios', App\Http\Controllers\ConveniosController::class);
    Route::resource('contratos', App\Http\Controllers\ContratoController::class);
    Route::get('aumentos/{contrato}/edit', [App\Http\Controllers\ContratoController::class, 'edit_aumento'])->name('aumentos.edit_aumento');
    Route::resource('monto', App\Http\Controllers\MontoController::class);
    Route::resource('caratula', App\Http\Controllers\CaratulaController::class);
    Route::resource('contratos.aumento', App\Http\Controllers\AumentoController::class);
    Route::resource('contratos.boletagarantia', App\Http\Controllers\MontoBoletaController::class);
    Route::resource('contratos.multas', App\Http\Controllers\MultasController::class);
    Route::get('multas', [App\Http\Controllers\MultasController::class, 'index_alertas'])->name('multas.index_alertas');
    Route::get('/contrato', [App\Http\Controllers\ContratoController::class, 'index_alerta'])->name('contrato.index_alerta');
    Route::get('/garantías', [App\Http\Controllers\MontoBoletaController::class, 'index_alerta'])->name('boletagarantia.index_alerta');
    Route::resource('contratos.movimientos', App\Http\Controllers\MovimientosController::class);
});

