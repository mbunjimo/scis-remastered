<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'id' => '1',
            'name' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'userId' => '1234567890',
            'password' => Hash::make('password'),
            'role_id' => '1', // or whatever the role id is
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
