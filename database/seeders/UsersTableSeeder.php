<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // ADMIN - sEEDER
            [
                'name'=> 'Admin',
                'username'=> 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('111'),
                'role'=> 'admin',
                'status'=> 'active',
                
            ],
            // AGENT - SEEDER
            [
                'name'=> 'Agent',
                'username'=> 'agent',
                'email'=> 'agent@gmail.com',
                'password'=> Hash::make('111'),
                'role'=> 'agent',
                'status'=> 'active',
                
            ],
            // USER - SEEDER
            [
                'name'=> 'User',
                'username'=> 'user',
                'email'=> 'user@gmail.com',
                'password'=> Hash::make('111'),
                'role'=> 'user',
                'status'=> 'active',
                
            ]
        ]);
    }
}
