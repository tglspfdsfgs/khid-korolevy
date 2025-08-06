<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(Request $request)
    {
        return view('main', [
            'title' => 'вхід',
            'page' => 'pages.auth.login',
        ]);
    }

    /**
     * Handle an auth request.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'emailOrPassword' => 'Невірно введенні електронна пошта чи пароль',
        ]);
    }

    /**
     * Destroy an auth session.
     */
    public function destroy(Request $request)
    {
        dump('logout request');
    }
}
