<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    /**
     * Autentica o usuário
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    /**
     * Cria um novo usuário
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }

}
