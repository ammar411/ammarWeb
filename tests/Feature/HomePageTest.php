<?php

it('loads the home page successfully', function () {
    $response = $this->get('/');
    $response->assertOk();
});

it('loads the about page successfully', function () {
    $response = $this->get('/about');
    $response->assertOk();
});

it('loads the contact page successfully', function () {
    $response = $this->get('/contact');
    $response->assertOk();
});

it('loads the services page successfully', function () {
    $response = $this->get('/services');
    $response->assertOk();
});
