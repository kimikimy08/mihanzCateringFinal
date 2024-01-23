<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\ServiceController;

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

        // If not, redirect with the default value
        $defaultCategory = 'default'; // Replace 'default' with your actual default category
        $route = route('user.servicePackages', ['serviceCategory' => $defaultCategory]);
        return redirect($route);
    }
}
