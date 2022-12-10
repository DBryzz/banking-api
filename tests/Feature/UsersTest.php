<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_that_user_can_login()
    {
        $user = User::find(1);
        $response = $this->post('/api/test/login', ['email' => $user->email, 'password' => 'Password1']);
        $response
            ->assertJson(['success' => true]);
    }

    public function test_that_user_can_logout()
    {
        $user = User::find(1);
        $response = $this->post('/api/test/login', ['email' => $user->email, 'password' => 'Password1']);
        $authUser = Auth::user();
        $response = $this->withoutMiddleware('auth.apikey')->post('/api/test/secure/cust/logout');

        $response
            ->assertJson(['success' => true]);
    }
}