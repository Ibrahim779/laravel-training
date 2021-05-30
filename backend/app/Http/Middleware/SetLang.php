<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLang
{
    public const LANG_KEY = 'lang';
    private const DEFAULT_LANG = 'ar';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale(session(self::LANG_KEY));
        if (session(self::LANG_KEY)){
            if (session(self::LANG_KEY) == self::DEFAULT_LANG)
                session(['dir' => 'rtl']);
            else
                session(['dir' => 'ltr']);
        }else{
            session(['dir' => 'rtl']);
        }
        return $next($request);
    }
}
