<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected const ROOT = '/';

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

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended($this::ROOT);
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
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($this::ROOT);
    }
}
