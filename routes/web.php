<?php

use App\Http\Controllers\EditUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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

//RUTA DE INICIO DE LA PAGINA
Route::get('/', HomeController::class)->name('home');

Auth::routes();

//RUTA PARA EDITAR PERFIL USUARIO
Route::get('/UpdateProfile', [EditUserController::class, 'NewProfile'])->name('NewProfile')->middleware('auth');
Route::put('/changeProfile', [EditUserController::class, 'changeProfile'])->name('changeProfile');

// RUTA PARA CAMBIO DE CONTRASEÑA
Route::get('/UpdatePassword' , [EditUserController::class, 'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password', [EditUserController::class, 'changePassword'])->name('changePassword');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
