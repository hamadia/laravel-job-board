<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role'=> 'admin',
            'password'=>Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Editor Man',
            'email' => 'man@example.com',
            'role'=> 'editor',
            'password'=>Hash::make('12345678'),
        ]);

         User::factory()->create([
            'name' => 'Editor woman',
            'email' => 'woman@example.com',
            'role'=> 'editor',
            'password'=>Hash::make('12345678'),
        ]);
    }
}
