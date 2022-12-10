<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Database\Seeders\AccountsTableSeeder;
use Database\Seeders\ApikeysTableSeeder;
use Database\Seeders\TransactionsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Ejarnutowski\LaravelApiKey\Models\ApiKey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_that_users_model_exists()
    {
        // Run the DatabaseSeeder...
        $this->seed();
        /* // Run an array of specific seeders...
        $this->seed([
            // UsersTableSeeder::class,
            ApikeysTableSeeder::class,
            AccountsTableSeeder::class,
            // TransactionsTableSeeder::class,
        ]); */

        $this->seed(UsersTableSeeder::class);

        $user = User::find(1);
        $this->assertModelExists($user);
    }

    public function test_that_api_keys_model_exists()
    {
        // Run the DatabaseSeeder...
        $this->seed();

        $this->seed(ApikeysTableSeeder::class);

        $apiKey = ApiKey::find(1);
        $this->assertModelExists($apiKey);
    }

    public function test_that_accounts_model_exists()
    {
        // Run the DatabaseSeeder...
        $this->seed();

        $this->seed(AccountsTableSeeder::class);

        $account = Account::find(1);
        $this->assertModelExists($account);
    }

    public function test_that_transactions_model_exists()
    {
        // Run the DatabaseSeeder...
        $this->seed();

        $this->seed(TransactionsTableSeeder::class);

        $transaction = Transaction::find(1);
        $this->assertModelExists($transaction);
    }
}