<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Providers\ProjectProviders\RouteServiceProvider as RouteSP;
use Illuminate\Http\Request;

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
    public function store(AuthRequest $request)
    {
        return ($request->authenticate()) ?
            redirect()->intended(RouteSP::ROOT) :
            back()->withErrors('Невірно введенні електронна пошта чи пароль');
    }

    /**
     * Destroy an auth session.
     */
    public function destroy(AuthRequest $request)
    {
        $request->deauthenticate();

        return redirect(RouteSP::ROOT);
    }
}
