<?php 

namespace App\Http\Middleware\App;

use Application, Closure, Credentials;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userLanguage = Credentials::locale();
        if (in_array($userLanguage, trans('selects.locale')) && app()->getLocale() != $userLanguage) {
            app()->setLocale($userLanguage);
        }
        return $next($request);
    }
}
