<?php

namespace Darkjinnee\Footing\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanctumAuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
