<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

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

// Route::get('/admin/users',[UserController::class, 'index'])->name('admin.users.index');
// Route::get('admin/user/{user}' ,[UserController::class, 'show']);

// Route::get('register', [UserController::class, 'register']);
// Route::post('store', [UserController::class, 'create'])->name('users.store');

// //Paginae função para alterar senha
// Route::get('resetPassword', [UserController::class, 'pageResetPassword'])->name('user.reset.index');
// Route::post('resetPassword', [UserController::class, 'resetPassword'])->name('user.reset.store');
