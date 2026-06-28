<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::composer('layouts.admin', function ($view) {
            $pendingRequests = \App\Models\InformationRequest::where('is_read', false)->latest()->take(5)->get();
            $pendingCount = \App\Models\InformationRequest::where('is_read', false)->count();
            
            $view->with([
                'notifications' => $pendingRequests,
                'notif_count' => $pendingCount
            ]);
        });
    }
}
