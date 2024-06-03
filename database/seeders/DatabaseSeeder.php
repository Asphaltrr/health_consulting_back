<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Pour générer un token aléatoire

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création de 10 utilisateurs avec des données générées aléatoirement
        //User::factory(10)->create();

        // Création d'un utilisateur spécifique
        /*User::factory()->create([
            'name' => 'Test User',
            'role' => 'admin', // Supposons que 'admin' soit un rôle valide
            'numero_de_telephone' => '0123456789',
            'date_de_naissance' => '1990-01-01', // Date de naissance format YYYY-MM-DD
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Hashage du mot de passe
            'remember_token' => Str::random(10), // Token aléatoire pour la session
        ]);*/

        // Appel aux autres seeders
        $this->call([
            ChambreSeeder::class,
            LitSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
