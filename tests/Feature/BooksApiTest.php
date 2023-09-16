<?php

it('retrieves correct data from the books API', function () {
    // ARRANGE

    // ACT
    $response = $this->json(method: 'GET', uri: '/books/1');

    // ASSERT
    expect($response->getStatus())->toBeInt()->toBe(200)
        ->and($response->getBody())->toMatchJson([
            'id' => 1,
            'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
            'year_published' => 2008,
            'author' => [
                'id' => 1,
                'name' => 'Robert C. Martin',
                'bio' => 'This is an author'
            ]
        ]);
});