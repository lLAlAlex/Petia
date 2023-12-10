<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Nicholas Chandra',
                'username' => 'NC',
                'email' => 'nicoch4n@gmail.com',
                'phone' => '81806069306',
                'password' => bcrypt('nc123'),
                'role' => 'Admin',
                'profileImage' => '1673792812.png',
                'isApproved' => true
            ],
            [
                'name' => 'Customer 1',
                'username' => 'Customer',
                'email' => 'customer@gmail.com',
                'phone' => '01212341234',
                'password' => bcrypt('customer123'),
                'role' => 'Customer',
                'profileImage' => '1673792812.png',
                'isApproved' => false
            ],
            [
                'name' => 'LCAS Shelter',
                'username' => 'LCAS Shelter',
                'email' => 'shelter@gmail.com',
                'phone' => '08112341234',
                'password' => bcrypt('shelter123'),
                'role' => 'Shelter',
                'profileImage' => '1673792812.png',
                'isApproved' => true
            ],
            [
                'name' => 'LCAS Shelter 2',
                'username' => 'LCAS Shelter 2',
                'email' => 'shelter2@gmail.com',
                'phone' => '08112341234',
                'password' => bcrypt('shelter123'),
                'role' => 'Shelter',
                'profileImage' => '1673792812.png',
                'isApproved' => true
            ]
        ];

        DB::table('users')->insert($data);
    }
}
