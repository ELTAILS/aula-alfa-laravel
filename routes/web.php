<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/**
 * Pagina inicial
 */
Route::get('/', function () { return view('index', ['user' => Auth::user()]); })->middleware('auth')->name('home');

/**
 * Rotas de login
 */
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('throttle:5,1')->name('login.authenticate');

/**
 * Rotas de cadastro
 */
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store', [UserController::class, 'create'])->name('users.store');

/**
 * Logout
 */
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/**
 * Area administrativa
 */
Route::middleware(['auth', EnsureAdmin::class])->prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user/{user}', [UserController::class, 'show']);
});

/**
 * Recuperacao de senha (preservadas)
 */
Route::get('resetPassword', [UserController::class, 'pageResetPassword'])->name('user.reset.index');
Route::post('resetPassword', [UserController::class, 'resetPassword'])->name('user.reset.store');
