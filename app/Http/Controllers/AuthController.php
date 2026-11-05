<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Dispara a view de login
     * @return \Illuminate\View\View
     */
    public function login(): view
    {
        return view('login.login');
    }

    /**
     * Dispara a view de registro
     * @return \Illuminate\View\View
     */
    public function register(): view
    {
        return view('login.register');
    }

    /**
     * Realiza o logout do usuário
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
