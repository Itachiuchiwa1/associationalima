<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin DÉMÉ',
            'email' => 'admin@deme.org',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '+33123456789',
            'status' => 'active',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Utilisateur Test',
            'email' => 'user@deme.org',
            'password' => bcrypt('password'),
            'role' => 'utilisateur',
            'phone' => '+33987654321',
            'status' => 'active',
        ]);
    }
}
