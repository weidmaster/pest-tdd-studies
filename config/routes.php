<?php

use App\Http\Response;
use App\Controllers\BooksController;

$routes = [
    [
        'GET',
        '/books/{id:\d+}',
        [BooksController::class, 'show']
    ]
];

return $routes;
