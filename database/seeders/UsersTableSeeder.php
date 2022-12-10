<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'id' => 1
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => bcrypt('password'),
        // ]);

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'dbryzz.dev+1@gmail.com',
            'password' => '$2y$10$0GMxOvHQXqpuc.FdbW0fuu6JUG3qw3j1.l1jw.hb6l8fk9eGXXzLi',
            'role' => 'admin',
            'created_at' => '2022-12-06 14:10:35',
            'updated_at' => '2022-12-06 14:10:35'
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Cachier User',
            'email' => 'dbryzz.dev+2@gmail.com',
            'password' => '$2y$10$fukBT3f8I812n.AsYRPQyew7vMkPU0SApmfMu6Em2sOT7/sEL7Xcy',
            'role' => 'cachier',
            'created_at' => '2022-12-06 15:35:38',
            'updated_at' => '2022-12-06 15:35:38'
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Domou3 Brice3',
            'email' => 'dbryzz.dev+3@gmail.com',
            'password' => '$2y$10$LRCVmN/SIEIcfohwNNK/uOrvEO.s1xbeo3RtC1d2LggUU1mReuX6K',
            'role' => 'customer',
            'created_at' => '2022-12-06 15:54:48',
            'updated_at' => '2022-12-06 15:54:48'
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Domou4 Brice4',
            'email' => 'dbryzz.dev+4@gmail.com',
            'password' => '$2y$10$aDnjdIx7reLQTE54Nb4ywO09gqXalDIPUKotKEIZ04ypt/ok8IrI.',
            'role' => 'customer',
            'created_at' => '2022-12-07 15:54:48',
            'updated_at' => '2022-12-07 15:54:48'
        ]);
    }
}