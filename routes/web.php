<?php

use App\Http\Controllers\ChannelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\RegisterController;




/**
 * Rutas del login
 */
Route::get('/', [LoginController::class, 'index']); 
Route::get('/login', [LoginController::class, 'index']); 
Route::post('/login', [LoginController::class, 'validateUser']);

/**
 * Ruta logout
 */
Route::get('/logout', [LogoutController::class, 'index']);


/**
 * Rutas del registro de usuarios
 */
Route::get('/complete-registration', [RegisterController::class, 'completeRegistration']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
