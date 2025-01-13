<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
              // Register the middleware alias
              Route::aliasMiddleware('is_admin', AdminMiddleware::class);
              DB::listen(function ($query) {
                Log::info($query->sql);
                Log::info($query->bindings);
                Log::info($query->time);
            });
    }
}
