<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laratrust\Laratrust;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->user()->hasRole($role))
        {
        return $next($request);
        }
        return response()->json(['Vous n\'etes pas autorisé a accéder a cette page.']);
        /* return response()->view('errors.check-permission'); */
    }
}
