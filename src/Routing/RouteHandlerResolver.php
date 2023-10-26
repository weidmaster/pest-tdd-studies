<?php

namespace App\Routing;

use Closure;

class RouteHandlerResolver
{
    public function resolve(Closure|array $handler): callable
    {
        return $handler;
    }
}
