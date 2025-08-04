<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(Request $request)
    {
        dump('login form');
    }

    /**
     * Handle an auth request.
     */
    public function store(Request $request)
    {
        dump('login request');
    }

    /**
     * Destroy an auth session.
     */
    public function destroy(Request $request)
    {
        dump('logout request');
    }
}
