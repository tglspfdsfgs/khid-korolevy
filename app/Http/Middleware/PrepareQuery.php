<?php

namespace App\Http\Middleware;

use App\Enums\State;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrepareQuery
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $states = [
            State::published->value,
            State::draft->value,
            State::deleted->value,
        ];

        $state = $request->query('state');

        if (auth()->check() && ! in_array($state, $states, true)) {
            $request->merge(['state' => State::published->value]);
        }

        if (! auth()->check()) {
            $request->merge(['state' => State::published->value]);
        }

        return $next($request);
    }
}
