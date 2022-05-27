<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TablonController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\TicketController;



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

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index'); //Mostrar usuarios
Route::get('/usuarios/{id}', [UserController::class, 'edit'])->name('usuarios.edit'); //Mostrar vista de actualizar
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update'); //Actualizar usuarios
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy'); //Eliminar usuarios

Route::get('/tablones', [TablonController::class, 'index'])->name('tablones.index'); //Mostrar tablon
Route::get('/tablones/register', [TablonController::class,'register'])->name('tablones.register'); //Mostrar registro de tablon
Route::post('/tablones/store', [TablonController::class, 'store'])->name('tablones.store'); //Crear tablon
Route::get('/tablones/{id}', [TablonController::class, 'edit'])->name('tablones.edit'); //Mostrar vista de actualizar
Route::put('/tablones/{id}', [TablonController::class,'update'])->name('tablones.update'); //Actualizar tablon
Route::delete('/tablones/{id}', [TablonController::class, 'destroy'])->name('tablones.destroy');//Eliminar tablon


Route::get('/notificaciones', [NotificacionesController::class, 'index'])->name('notificaciones.index'); //Mostrar tablon
Route::get('/notificaciones/register', [NotificacionesController::class,'register'])->name('notificaciones.register'); //Mostrar registro de tablon
Route::post('/notificaciones/store', [NotificacionesController::class, 'store'])->name('notificaciones.store'); //Crear tablon
Route::get('/notificaciones/{id}', [NotificacionesController::class, 'edit'])->name('notificaciones.edit'); //Mostrar vista de actualizar
Route::put('/notificaciones/{id}', [NotificacionesController::class,'update'])->name('notificaciones.update'); //Actualizar tablon
Route::delete('/notificaciones/{id}', [NotificacionesController::class, 'destroy'])->name('notificaciones.destroy');//Eliminar tablon

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); //Mostrar tablon
Route::get('/tickets/register', [TicketController::class,'register'])->name('tickets.register'); //Mostrar registro de tablon
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store'); //Crear tablon
Route::get('/tickets/{id}', [TicketController::class, 'edit'])->name('tickets.edit'); //Mostrar vista de actualizar
Route::put('/tickets/{id}', [TicketController::class,'update'])->name('tickets.update'); //Actualizar tablon
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');//Eliminar tablon

