<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale', 'id');
        App::setLocale($locale);

        return $next($request);
    }
}
