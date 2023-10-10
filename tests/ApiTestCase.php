<?php

namespace Tests;

use App\Http\Kernel;
use App\Http\Request;
use App\Http\Response;
use App\Routing\Router;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class ApiTestCase extends BaseTestCase
{
    public function json(
        string $method = 'GET',
        string $uri = '/',
        array $data = [],
        array $headers = []
    ): Response {
        // json encode the data
        $content = json_encode($data);

        // merge server variables with headers
        $server = array_merge([
            'CONTENT_TYPE' => 'application/json',
            'Accept' => 'application/json'
        ], $headers);

        // create a $request using a static named constructor
        $request = Request::create(
            method: $method,
            uri: $uri,
            server: $server,
            content: $content
        );

        // create / resolve the kernel
        $kernel = new Kernel(new Router());

        // obtain a $response object
        $response = $kernel->handle($request);

        // return the response
        return $response;
    }
}
