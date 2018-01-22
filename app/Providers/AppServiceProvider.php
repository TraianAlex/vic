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
        \Blade::if('admin', function(){
            return auth()->user()->hasRole('admin');
        });
        \Blade::if('adminlog', function(){
            return admins()->check();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    }
}
