<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Entities\Site;

class LocaleRedirect
{
    public function handle($request, Closure $next){

        $site = new Site();
        $requestLocale = $request->segment(1);
        if (!array_key_exists($requestLocale, $site->getAllLocalizations())) {$requestLocale = $site->getDefaultLocale();}
            $userLocale = Session::get('locale');
            Session::remove('locale');
            if (array_key_exists($userLocale, $site->getAllLocalizations())) {
                if ($requestLocale !== $userLocale) {
                    $segments = $request->segments();
                    if ($requestLocale !== $site->getDefaultLocale()){
                        array_shift($segments);
                    }
                //    dd($segments);
                    array_unshift($segments, $userLocale);
                //    dd($segments);
                    return redirect()->to(implode('/', $segments));
                }

        }
        return $next($request);
    }
}
