<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;//

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)//Kernel $kernel
    {
        \Blade::if('admin', function(){
            return auth()->user()->hasRole('admin');
        });
        \Blade::if('adminlog', function(){
            return admins()->check();
        });

        if ($this->app->isLocal()) {
            $kernel->pushMiddleware('\\App\\Http\\Middleware\\FlashViewCache');
        }

        \Blade::directive('cache', function($exp) {
            return "<?php if(! \\App\\Resources\\RussianCaching::setUp($exp)) : ?>";
        });
        \Blade::directive('endcache', function() {
            return "<?php endif; echo \\App\\Resources\\RussianCaching::tearDown() ?>";
        });

        // custom directive
        \Blade::directive('hello', function($exp){
            return "<?= 'hello ' . $exp; ?>";
        });
        \Blade::directive('ago', function($exp){
            return "<?= with($exp)->created_at->diffForHumans(); ?>";
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
