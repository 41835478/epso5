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
        //Blade: role()
        Blade::directive('Role', function ($role) {
            return "<?php if(auth()->check() && Credentials::role({$role})): ?>";
        });

        //Blade: hasRoles()
        Blade::directive('hasRoles', function ($roles) {
            return "<?php if(auth()->check() && Credentials::hasRoles({$roles})): ?>";
        });
   
        //Blade: hasAnyRoles()
        Blade::directive('hasAnyRoles', function ($roles) {
            return "<?php if(auth()->check() && Credentials::hasAnyRoles({$roles})): ?>";
        });

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
