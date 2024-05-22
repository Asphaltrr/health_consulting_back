<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'nom' => 'Test User',
            'prenom' => 'Test User',
            'telephone' => 'Test User',
            'email' => 'test@example.com',
            'cni' => 'Test User',
            'compteBanque' => 'Test User',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => 'fhfhf',
        ]);
    }
}
