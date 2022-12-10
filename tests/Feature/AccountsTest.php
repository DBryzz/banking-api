<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_admin_can_get_account_balance()
    {
        $response = $this->get('/api/test/secure/cachr/account/1/balance/get');

        $response
            ->assertStatus(200)
            ->assertJson(['success' => true, 'balance' => 25000]);
    }
}