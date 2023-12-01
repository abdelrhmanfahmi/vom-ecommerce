<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->type == 'user') {
                return $next($request);
            }
                return response()->json(['message' => 'Unauthorized' , 403]);
        }
            return response()->json(['message' => 'Unauthorized' , 403]);
    }
}