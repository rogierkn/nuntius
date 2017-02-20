<?php

namespace Nuntius\Tests;

use Nuntius\NuntiusServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [NuntiusServiceProvider::class];
    }

}