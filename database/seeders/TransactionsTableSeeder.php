<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            'id' => 1,
            'amount' => 3000,
            'type' => 'withdrawal',
            'status' => 'succeeded',
            'account_id' => 5,
            'reference' => 'E651E57F6D',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:23:58',
            'updated_at' => '2022-12-08 23:23:58'
        ]);

        DB::table('transactions')->insert([
            'id' => 2,
            'amount' => 300000,
            'type' => 'withdrawal',
            'status' => 'failed',
            'account_id' => 5,
            'reference' => '30994DABDA',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:30:35',
            'updated_at' => '2022-12-08 23:30:35'
        ]);

        DB::table('transactions')->insert([
            'id' => 3,
            'amount' => 300000,
            'type' => 'withdrawal',
            'status' => 'failed',
            'account_id' => 2,
            'reference' => 'CD869EBC58',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:31:46',
            'updated_at' => '2022-12-08 23:31:46'
        ]);

        DB::table('transactions')->insert([
            'id' => 4,
            'amount' => 3000,
            'type' => 'withdrawal',
            'status' => 'failed',
            'account_id' => 2,
            'reference' => '49574AB4FB',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:34:34',
            'updated_at' => '2022-12-08 23:34:34'
        ]);

        DB::table('transactions')->insert([
            'id' => 5,
            'amount' => 13000,
            'type' => 'deposit',
            'status' => 'succeeded',
            'account_id' => 2,
            'reference' => '942ABFA887',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:36:29',
            'updated_at' => '2022-12-08 23:36:29'
        ]);

        DB::table('transactions')->insert([
            'id' => 6,
            'amount' => 200000,
            'type' => 'transfer',
            'status' => 'failed',
            'account_id' => 2,
            'reference' => '7D5DCEEBC6',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:51:15',
            'updated_at' => '2022-12-08 23:51:15'
        ]);

        DB::table('transactions')->insert([
            'id' => 7,
            'amount' => 200000,
            'type' => 'transfer',
            'status' => 'failed',
            'account_id' => 2,
            'reference' => 'F0AB7B0F79',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-08 23:58:27',
            'updated_at' => '2022-12-08 23:58:27'
        ]);

        DB::table('transactions')->insert([
            'id' => 8,
            'amount' => 200000,
            'type' => 'transfer',
            'status' => 'failed',
            'account_id' => 2,
            'reference' => '3BE60F1F98',
            'transfer_motive' => 'Testing insufficient amount',
            'receiver_account' => 'CU3.27796',
            'created_at' => '2022-12-09 00:00:05',
            'updated_at' => '2022-12-09 00:00:05'
        ]);

        DB::table('transactions')->insert([
            'id' => 9,
            'amount' => 20000,
            'type' => 'transfer',
            'status' => 'succeeded',
            'account_id' => 3,
            'reference' => '19EE2DF896',
            'transfer_motive' => 'between accounts of same user',
            'receiver_account' => 'SA3.29306',
            'created_at' => '2022-12-09 00:01:29',
            'updated_at' => '2022-12-09 00:01:29'
        ]);

        DB::table('transactions')->insert([
            'id' => 10,
            'amount' => 20000,
            'type' => 'transfer',
            'status' => 'succeeded',
            'account_id' => 3,
            'reference' => 'FE2A9770EA',
            'transfer_motive' => 'between accounts of same user',
            'receiver_account' => 'SA3.29306',
            'created_at' => '2022-12-09 00:03:58',
            'updated_at' => '2022-12-09 00:03:58'
        ]);

        DB::table('transactions')->insert([
            'id' => 11,
            'amount' => 20000,
            'type' => 'transfer',
            'status' => 'succeeded',
            'account_id' => 3,
            'reference' => 'D7F31669A2',
            'transfer_motive' => 'between accounts of same user',
            'receiver_account' => 'SA3.29306',
            'created_at' => '2022-12-09 00:23:54',
            'updated_at' => '2022-12-09 00:23:54'
        ]);

        DB::table('transactions')->insert([
            'id' => 12,
            'amount' => 40000,
            'type' => 'transfer',
            'status' => 'succeeded',
            'account_id' => 2,
            'reference' => '8FF662EF91',
            'transfer_motive' => 'between accounts of same user reverse',
            'receiver_account' => 'CU3.27796',
            'created_at' => '2022-12-09 00:25:10',
            'updated_at' => '2022-12-09 00:25:10'
        ]);

        DB::table('transactions')->insert([
            'id' => 13,
            'amount' => 50000,
            'type' => 'transfer',
            'status' => 'succeeded',
            'account_id' => 5,
            'reference' => 'E6B8C7DBD2',
            'transfer_motive' => 'between accounts of different users',
            'receiver_account' => 'SA3.29306',
            'created_at' => '2022-12-09 00:28:01',
            'updated_at' => '2022-12-09 00:28:01'
        ]);

        DB::table('transactions')->insert([
            'id' => 14,
            'amount' => 5000,
            'type' => 'withdrawal',
            'status' => 'succeeded',
            'account_id' => 2,
            'reference' => 'D5500F00B4',
            'transfer_motive' => 'No Motive',
            'receiver_account' => NULL,
            'created_at' => '2022-12-09 16:44:44',
            'updated_at' => '2022-12-09 16:44:44'
        ]);
    }
}