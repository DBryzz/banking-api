<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'id' => 1,
            'type' => 'current',
            'balance' => '25000',
            'account_number' => 'CU3.61957',
            'status' => 'pending',
            'user_id' => 3,
            'created_at' => '2022-12-08 21:50:45',
            'updated_at' => '2022-12-08 21:50:45'
        ]);

        DB::table('accounts')->insert([
            'id' => 2,
            'type' => 'savings',
            'balance' => '110000',
            'account_number' => 'SA3.29306',
            'status' => 'approved',
            'user_id' => 3,
            'created_at' => '2022-12-08 21:51:51',
            'updated_at' => '2022-12-09 16:44:44'
        ]);

        DB::table('accounts')->insert([
            'id' => 3,
            'type' => 'current',
            'balance' => '120000',
            'account_number' => 'CU3.27796',
            'status' => 'approved',
            'user_id' => 3,
            'created_at' => '2022-12-08 21:52:40',
            'updated_at' => '2022-12-09 00:25:10'
        ]);

        DB::table('accounts')->insert([
            'id' => 4,
            'type' => 'savings',
            'balance' => '120000',
            'account_number' => 'SA4.12633',
            'status' => 'blocked',
            'user_id' => 4,
            'created_at' => '2022-12-08 21:53:57',
            'updated_at' => '2022-12-08 22:48:40'
        ]);

        DB::table('accounts')->insert([
            'id' => 5,
            'type' => 'current',
            'balance' => '194000',
            'account_number' => 'CU4.71887',
            'status' => 'approved',
            'user_id' => 4,
            'created_at' => '2022-12-08 21:55:37',
            'updated_at' => '2022-12-09 00:28:01'
        ]);

        DB::table('accounts')->insert([
            'id' => 6,
            'type' => 'current',
            'balance' => '250000',
            'account_number' => 'CU3.35160',
            'status' => 'blocked',
            'user_id' => 3,
            'created_at' => '2022-12-09 15:46:12',
            'updated_at' => '2022-12-09 16:04:28'
        ]);

        DB::table('accounts')->insert([
            'id' => 7,
            'type' => 'savings',
            'balance' => '38000',
            'account_number' => 'SA3.97433',
            'status' => 'pending',
            'user_id' => 3,
            'created_at' => '2022-12-09 15:58:01',
            'updated_at' => '2022-12-09 15:58:01'
        ]);
    }
}