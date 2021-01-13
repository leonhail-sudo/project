<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Create Admin
            $admin = resolve('User')->store([
                'first_name' => 'Administrator',
                'last_name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]);

            $admin->assignRole('admin');
            // Create Root Agent
            $user = resolve('User')->store([
                'first_name' => 'User',
                'last_name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
            ]);

            $user->assignRole('user');
        } catch (Exception $e) {
            throw $e;
        }
    }
}
