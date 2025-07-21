<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Models\Testimoni;

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
        View::composer('*', function ($view) {
            $testimoni = Testimoni::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->get();

            $view->with('testimoni', $testimoni);
        });
    }
}
