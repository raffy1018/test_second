<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetActiveRouter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $router = \App\Models\Router::first();

        session(['router_id' => null]);
        
        if($router && is_null(session('router_id')))
        {
            session(['router_id' => $router->id]);
        }
        
        return $next($request);
    }
}
