<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApikeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('api_keys')->insert([
            'id' => 1,
            'name' => 'bankingapi',
            'key' => 'JTJ8fR5wkuppNrj6wTFSIU5TJUNS45L6ANDeeWhiWvpj8bxcpV5R3Gk8lHQml9Gl',
            'active' => 1,
            'created_at' => '2022-12-08 20:30:47',
            'updated_at' => '2022-12-08 20:30:47'
        ]);

        DB::table('api_key_admin_events')->insert([
            'id' => 1,
            'api_key_id' => 1,
            'ip_address' => '127.0.0.1',
            'event' => 'created',
            'created_at' => '2022-12-08 20:30:47',
            'updated_at' => '2022-12-08 20:30:47'
        ]);
    }
}