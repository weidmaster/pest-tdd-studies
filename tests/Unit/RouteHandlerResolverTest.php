<?php

use App\Controllers\BooksController;
use App\Routing\RouteHandlerResolver;

beforeEach(function () {
    $this->container = include dirname(__DIR__, 2) . '/config/services.php';
});

it('resolves the correct handler closure', function () {
    // ARRANGE
    $routeHandlerResolver = new RouteHandlerResolver($this->container);
    $handlerInfo = fn () => 'foo';

    // ACT
    $handler = $routeHandlerResolver->resolve($handlerInfo);

    // ASSERT
    expect($handler)
        ->toBeCallable()
        ->toBe($handlerInfo);
});

it('resolves the correct handler controller', function () {
    // ARRANGE
    $routeHandlerResolver = new RouteHandlerResolver($this->container);
    $handlerInfo = [BooksController::class, 'show'];

    // ACT
    $handler = $routeHandlerResolver->resolve($handlerInfo);

    // ASSERT
    expect($handler)
        ->toBeCallable()
        ->and($handler[0])->toBeInstanceOf(BooksController::class);
});
