<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and an admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // If not an admin, return an unauthorized error
        abort(403, 'Unauthorized');
    }
}
