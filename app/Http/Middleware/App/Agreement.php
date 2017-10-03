<?php 

namespace App\Http\Middleware\App;

use Closure;
use Credentials;

class Agreement
{

    /**
     * @param array $allowedRoutes [Allowed routes without redirection]
     */
    protected $allowedRoutes = [
        //Don't change it, because we use its position [0] in the handle method ($redirecTo). 
        'dashboard.user.agreements.edit',
        'dashboard.user.agreements.update'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*
    |--------------------------------------------------------------------------
    | Show if hasnt been accepted the software conditions
    |--------------------------------------------------------------------------
    |
    */
    public function handle($request, Closure $next)
    {
        //The current route is...
        $currentRoute = $request->route()->getName();
        //Redirect route if not accepted 
        $redirecTo = $this->allowedRoutes[0];
        //Check for the conditions
        //And verify than we are not in the agreement page
        if (!Credentials::agreement()
            && !in_array($currentRoute, $this->allowedRoutes)
            && $request->route()->agreement != Credentials::id()) {
                return redirect()->route($redirecTo, Credentials::id());
        }

        return $next($request);
    }
}
