<?php

namespace App\Providers;

use App\Models\School;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
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
        Facades\View::composer('welcome', function (View $view) {
            $schools = School::paginate(50);

            $view->with('schools', $schools);
        });
    }
}
