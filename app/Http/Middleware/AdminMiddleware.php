<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in as admin
        if (!auth()->guard('admin')->check()) {
            // Redirect to admin login page if not authenticated
            return redirect()->route('admin');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
