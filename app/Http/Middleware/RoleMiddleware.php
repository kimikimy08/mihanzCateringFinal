<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
{
    foreach ($roles as $role) {
        if (auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }
    }

    abort(403, 'Unauthorized action.');
}
}
