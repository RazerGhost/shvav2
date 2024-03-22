<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $auth = auth()->user()->role;

        if ($auth != 2 && $auth != 1 && $auth != 0) {
            return response()->json('Opps! You do not have permission to access.');
        }
        return $next($request);
    }
}
