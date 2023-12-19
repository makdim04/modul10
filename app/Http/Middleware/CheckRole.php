<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Htpp\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (|Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
    if (in_array($request->user()->role, $roles)) {
    # code...
    return $next($request);
    }
    return abort(403);
    }
