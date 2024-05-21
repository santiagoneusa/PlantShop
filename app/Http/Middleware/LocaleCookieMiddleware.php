<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleCookieMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->hasCookie('locale'))
            app()->setLocale($request->cookie('locale'));

        return $next($request);
    }
}