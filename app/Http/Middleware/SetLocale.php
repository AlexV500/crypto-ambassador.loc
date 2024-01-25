<?php

namespace App\Http\Middleware;

use App\Services\Localization\LocalizationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langPrefix = LocalizationService::locale();

        if($langPrefix){
            App::setLocale($langPrefix);
        }

        return $next($request);
    }
}
