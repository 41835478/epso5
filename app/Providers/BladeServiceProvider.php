<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        |  Role: Check if the user has (at least) this role
        |  Role() - elseifRole() - endRole()
        |--------------------------------------------------------------------------
        */
        //Blade: Role()
        Blade::directive('Role', function ($role) {
            return "<?php if(auth()->check() && Credentials::role({$role})): ?>";
        });

        //Blade: elseifRole()
        Blade::directive('elseIfRole', function ($roles) {
            return "<?php elseif(auth()->check() && Credentials::role({$roles})): ?>";
        });

        //Blade: endRole()
        Blade::directive('endRole', function () {
            return '<?php endif; ?>';
        });

        /*
        |--------------------------------------------------------------------------
        |  Role: Check if the user has all the roles from a list of roles
        |  hasRoles() - endRoles()
        |--------------------------------------------------------------------------
        */
        //Blade: hasRoles()
        Blade::directive('hasRoles', function ($roles) {
            return "<?php if(auth()->check() && Credentials::hasRoles({$roles})): ?>";
        });
  
        /*
        |--------------------------------------------------------------------------
        |  Role: Check if the user has, at least one, from the list of roles
        |  hasAnyRoles() - endRoles()
        |--------------------------------------------------------------------------
        */ 
        //Blade: hasAnyRoles()
        Blade::directive('hasAnyRoles', function ($roles) {
            return "<?php if(auth()->check() && Credentials::hasAnyRoles({$roles})): ?>";
        });

        /*
        |--------------------------------------------------------------------------
        |  Role: End for hasAnyRoles() and hasRoles()
        |--------------------------------------------------------------------------
        */ 
        //Blade: endRoles()
        Blade::directive('endRoles', function () {
            return '<?php endif; ?>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
