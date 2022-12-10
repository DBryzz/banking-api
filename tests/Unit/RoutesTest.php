<?php

namespace Tests\Unit;

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
        $response = $this->post('/api/login');
        $response->assertHeaderMissing('X-Authorization');

        $response->assertNotFound();
    }

    public function test_that_status_is_401_without_api_key_in_request_header()
    {
        $response = $this->withHeader('X-Authorization',)->post('/api/secure/cachr/register');
        echo "hello";
        $response->withHeaders(['X-Authorization']);
        $response->assertUnauthorized();

        // $response = $this->post('/*');
        // // $this->assertMod


        $response->assertStatus(404);
        // $response->assertUnauthorized();
        $response->assertHeaderMissing('X-Authorization');
    }
}