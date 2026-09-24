<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    $this->seed();
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('can view packages page', function () {
    $this->seed();
    $response = $this->get('/packages');

    $response->assertStatus(200);
});
