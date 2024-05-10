<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'role'=>'admin',
            'phone_no'=>'01712155399',
            'address'=>'Gazipur',
        ]);
    }
}
