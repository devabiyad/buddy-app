<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users = [
                [
                    'name' => 'Buddy Admin',
                    'user_type' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin12345'),
                ],
                [
                    'name' => 'Buddy User',
                    'user_type' => 'user',
                    'email' => 'user@example.com',
                    'password' => Hash::make('user12345'),
                ]
            ];

        User::insert($users);
    }
}
