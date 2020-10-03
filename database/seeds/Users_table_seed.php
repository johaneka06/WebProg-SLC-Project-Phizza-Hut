<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
            'username' => 'JohnDoe001',
            'email' => 'johndoe001@domain.com',
            'password' => bcrypt('JohnDoe'),
            'phone_no' => '081123456789',
            'address' => 'Kemanggisan',
            'gender' => 'male',
            'role' => 'Member'
            ],
            [
                'username' => 'JohnDoe002',
                'email' => 'johndoe002@domain.com',
                'password' => bcrypt('JohnDoe'),
                'phone_no' => '081987654321',
                'address' => 'Kemanggisan',
                'gender' => 'male',
                'role' => 'member'
            ]
        );
    }
}
