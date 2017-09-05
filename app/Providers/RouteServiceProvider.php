<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // Route::pattern('bank', '[0-9]+');
        parent::boot();

        Route::pattern('biocide', '[0-9]+');
        Route::pattern('city', '[0-9]+');
        Route::pattern('client', '[0-9]+');
        Route::pattern('crops', '[0-9]+');
        Route::pattern('crop_varieties', '[0-9]+');
        Route::pattern('id', '[0-9]+');
        Route::pattern('pattern', '[0-9]+');
        Route::pattern('pest', '[0-9]+');
        Route::pattern('size', '[0-9]+');
        Route::pattern('user', '[0-9]+');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapGuestRoutes();
        $this->mapAuthRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "Guest" routes for the application.
     *
     * @return void
     */
    protected function mapGuestRoutes()
    {
        Route::middleware(['web', 'guest'])
             ->namespace($this->namespace)
             ->group(base_path('routes/guest.php'));
    }

    /**
     * Define the "Auth" routes for the application.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::middleware(['web', 'auth', 'noFrames'])
             ->namespace($this->namespace)
             ->group(base_path('routes/auth.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
