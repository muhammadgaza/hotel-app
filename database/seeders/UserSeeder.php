<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('staff123')
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
