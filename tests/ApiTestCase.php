<?php

namespace Tests;

use App\Http\Request;
use App\Http\Response;
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

        $body = '{"id":1,"title":"Clean Code: A Handbook of Agile Software Craftsmanship",
            "year_published":2008,"author":{"id":1,"name":"Robert C. Martin","bio":"This is an author"}}';

        return new Response(body: $body, statusCode: 200, headers: []);
    }
}
