<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_that_status_is_404_if_route_does_not_exist()
    {
        $response = $this->post('/api');

        $response->assertNotFound();
    }

    public function test_that_status_is_401_without_api_key_in_request_header()
    {
        $response = $this->post('/api/login');


        $response->assertUnauthorized();
    }
}