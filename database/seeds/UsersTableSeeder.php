<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        [
            'name' => '鈴木',
            'email' => 'abcde@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => 'qwerty12'
        ],
        [
            'name' => '佐藤',
            'email' => 'fghjkl@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => 'yuiop678'
        ],
    ]);
    }
}
