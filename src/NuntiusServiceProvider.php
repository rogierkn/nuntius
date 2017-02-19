<?php

namespace Nuntius;

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
        $this->publishes([__DIR__ . '/config.php' => config_path('nuntius.php')]);

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'nuntius');
        $this->publishes([__DIR__ . '/resources/views' => resource_path('views/vendor/nuntius')]);

        $this->publishes([__DIR__.'/resources/assets' => public_path('vendor/nuntius')], 'public');

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
