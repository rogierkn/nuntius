<?php

namespace Nuntius;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NuntiusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config.php' => config_path('nuntius.php')], 'config');

        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'nuntius');
        $this->publishes([__DIR__ . '/resources/views' => resource_path('views/vendor/nuntius')], 'views');

        $this->publishes([__DIR__.'/resources/assets/public' => public_path('vendor/nuntius')], 'public');


        // Give the root URL to all views
        View::share('nuntius_root_url', '/nuntius/api');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
