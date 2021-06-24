<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->hasRole("customer")) {
            return response()->json([
                "success" => false,
                "message" => "Access Denied :("
            ], 403);
        }
        return $next($request);
    }
}
