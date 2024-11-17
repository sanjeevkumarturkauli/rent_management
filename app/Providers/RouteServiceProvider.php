<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        // Load web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Load API routes
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Load admin routes
        Route::middleware('web')
            ->prefix('admin') // Prefix for admin routes
            ->group(base_path('routes/admin.php'));
        // Load owner routes
        Route::middleware('web')
            ->prefix('owner') // Prefix for admin routes
            ->group(base_path('routes/owner.php'));
        // Load partner routes
        Route::middleware('web')
            ->prefix('partner') // Prefix for admin routes
            ->group(base_path('routes/partner.php'));
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
