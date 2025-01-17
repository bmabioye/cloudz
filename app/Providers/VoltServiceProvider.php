<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Livewire\Volt\Volt;
use App\Events\PurchaseSuccessful;
use App\Listeners\ProcessPurchaseSuccessful;

class VoltServiceProvider extends ServiceProvider
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
        Volt::mount([
            config('livewire.view_path', resource_path('views/livewire')),
            resource_path('views/pages'),
        ]);

        Event::listen(
            PurchaseSuccessful::class,
            [ProcessPurchaseSuccessful::class, 'handle']
        );
    }
}
