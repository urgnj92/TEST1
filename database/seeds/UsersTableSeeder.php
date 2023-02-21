<?php

use Illuminate\Database\Seeder;

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
            'name' => '田中',
            'email' => 'xxxx@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => 'ABCDEF'
        ],
        [
            'name' => '佐藤',
            'email' => 'OOOO@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => 'GHIJK'
        ],
    ]);
    }
}
