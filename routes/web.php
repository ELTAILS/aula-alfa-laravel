<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

/**
 * Pagina inicial
 */
Route::get('/', function () { return view('index'); })->name('home');

/**
 * Rotas de autenticação (publicas)
 */
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/register', [AuthController::class, 'create'])->name('register.store');

/**
 * Rotas protegidas (necessário autenticação)
 */
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
