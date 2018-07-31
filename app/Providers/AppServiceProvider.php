<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\CompanyInterface', 
            'App\Repositories\CompanyRepository'
        );

        $this->app->bind(
            'App\Repositories\UserInterface', 
            'App\Repositories\UserRepository'
        );
    }
}
