<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{

    public function handle(Request $request, Closure $next,$role): Response
    {
        if (!in_array($request->user()->role,$role)){
            return response()->json('forbbiden');
        }

        return $next($request);
    }
}
