<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Provider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $auth = auth()->user()->role;

        /**
         * use this code if you want to allow all users with roles 3, 2, 1, and 0 to access the route
         * if ($auth != 3 && $auth != 2 && $auth != 1 && $auth != 0) {
         */

        if ($auth != 3 && $auth != 1 && $auth != 0) {
            return response()->json('Oops! You do not have permission to access.');
        }
        return $next($request);
    }
}
