<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\http\Controllers\LoginController;
use App\http\Controllers\LogoutController;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('persona', PersonaController::class);

// rutas del controlador register
Route::controller(RegisterController::class)->group(function(){
    Route::get('/registro', 'mostrarFormulario')->name('registro');
    Route::post('/registrarme', 'create')->name('registrarme');
});
// rutas del controlador login
Route::controller(LoginController::class)->group(function(){
    Route::get('/','verificarLogin')->name('verificarLogin');
    Route::get('/login','mostrarLogin')->name('login');
    Route::post('/iniciarSesion','iniciarSesion')->name('iniciarSesion');
});

Route::get('/logout', [LogoutController::class, 'cerrarSesion'])->name('logout');
