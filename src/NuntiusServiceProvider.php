<?php

namespace Nuntius;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nuntius\Exceptions\NotImplementedException;
use Nuntius\Http\Middleware\CanAdminNuntius;
use Nuntius\Http\Middleware\CreatePost;
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
        $this->publishes([__DIR__ . '/config.php' => config_path('nuntius.php')], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');


        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'nuntius');
        $this->publishes([__DIR__ . '/resources/views' => resource_path('views/vendor/nuntius')], 'views');

        $this->publishes([__DIR__ . '/resources/assets/public' => public_path('vendor/nuntius')], 'public');


        $this->runBootTests();
        // Give the root URL to all views
        View::share('nuntius_root_url', '/nuntius/api');
    }

    private function runBootTests()
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
