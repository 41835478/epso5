<?php 

namespace App\Http\Middleware\App;

use App\Services\Application\Application;
use Illuminate\Support\Facades\Auth;
use Closure, Credentials;

class Role
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            return redirect()->guest('/login');
        }

        //Check for roles
        if (! Credentials::role($role)) {
            return Credentials::accessError();
        }
        return $next($request);
    }
}
