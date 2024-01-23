<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckServicePackages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user has visited the user.servicePackages route with the required parameter
        if ($request->session()->has('visited_service_packages')) {
            return $next($request);
        }

        // If not, redirect or handle it as you see fit
        $route = route('user.servicePackages', ['serviceCategory' => 'default']); // Replace 'default' with a default value or adjust as needed
        return redirect($route);
    }
}
