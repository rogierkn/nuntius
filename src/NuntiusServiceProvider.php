<?php

namespace Nuntius;

use Illuminate\Support\ServiceProvider;
use Nuntius\Exceptions\NotImplementedException;
use Nuntius\Interfaces\BlogAuthorization;
use ReflectionClass;

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

        $this->runBootTests();
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

    public function runBootTests()
    {
        if (!$this->modelImplementsAuthInterface()) {
            throw new NotImplementedException("The configured model " . config('nuntius.model.className') . " does not implement the Nuntius\\Interfaces\\BlogAuthorization interface");
        }
    }

    private function modelImplementsAuthInterface(): bool
    {
        $className = config('nuntius.model.className');
        $reflectionClass = new ReflectionClass($className);

        return $reflectionClass->implementsInterface(BlogAuthorization::class);
    }
}
