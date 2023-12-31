<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
//use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->role === 'Admin';
        });

        Gate::define('psychologist', function (User $user) {
            return $user->role === 'Psychologist';
        });
    }
}
