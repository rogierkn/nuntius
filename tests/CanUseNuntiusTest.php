<?php

namespace Nuntius\Tests;

use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Nuntius\Exceptions\AuthorizationException;
use Nuntius\Http\Middleware\CanUseNuntius;



class CanUseNuntiusTest extends TestCase
{
    public function testExceptionOnDenied()
    {
        $gate = $this->createMock(Gate::class);

        $gate->method('denies')
            ->willReturn(true);

        $this->expectException(AuthorizationException::class);

        $middleware = new CanUseNuntius($gate);
        $middleware->handle(new Request(), function () {
        });
    }

    public function testMiddlewarePasses() {
        $gate = $this->createMock(Gate::class);

        $gate->method('denies')
            ->willReturn(false);

        $middleware = new CanUseNuntius($gate);
        $result = $middleware->handle(new Request(), function() {
            return true;
        });

        $this->assertTrue($result);

    }


}




