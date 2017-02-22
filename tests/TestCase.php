<?php

namespace Nuntius\Tests;

use Nuntius\NuntiusServiceProvider;
use Nuntius\Tests\Models\User;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    protected function getPackageProviders($app)
    {
        return [NuntiusServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => ''
        ]);
        $app['config']->set('nuntius.model.className', User::class);
        $app['config']->set('nuntius.model.identifier', 'id');



    }

    // https://github.com/orchestral/testbench/issues/168
    protected function beforeApplicationDestroyed(callable $callback)
    {
        $this->beforeApplicationDestroyedCallbacks = [];
    }

}