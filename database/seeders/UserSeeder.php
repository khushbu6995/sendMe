<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            ['name' => 'user', 'address' => 'vadodara','phone'=>9090909090,'email'=>'user@email.com','gender'=>'male','otp'=>''],
            ['name' => 'user1', 'address' => 'mumbai','phone'=>9090909091,'email'=>'user1@email.com','gender'=>'female','otp'=>''],
        ],);
    }
}
