<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperarioController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');//Mostrar usuarios
Route::get('/usuarios/{id}', [UserController::class, 'edit'])->name('usuarios.edit');//Mostrar vista de actualizar
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');//Actualizar usuarios
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');//Eliminar usuarios

Route::get('/operarios', [OperarioController::class, 'index'])->name('operarios.index');//Mostrar operarios
Route::get('/operarios/register', [OperarioController::class, 'register'])->name('operarios.register');//Mostrar registro de operarios
Route::post('/operarios/store', [OperarioController::class, 'store'])->name('operarios.store');//Crear operario
Route::get('/operarios/{id}', [OperarioController::class, 'edit'])->name('operarios.edit');//Mostrar vista de actualizar
Route::put('/operarios/{id}', [OperarioController::class, 'update'])->name('operarios.update');//Actualizar operario
Route::delete('/operarios/{id}', [OperarioController::class, 'destroy'])->name('operarios.destroy');//Eliminar operarios


