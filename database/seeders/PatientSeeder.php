<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Patient;
class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 21; $i++) {
            Patient::create([
                'nom_complet' => $faker->name,
                'date_de_naissance' => $faker->date($format = 'Y-m-d', $max = '2003-12-31'),
                'sexe' => $faker->randomElement(['masculin', 'féminin']),
                'adresse' => $faker->address,
                'numero_de_telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'antecedents_medicaux' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'groupe_sanguin' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'medicaments_actuels' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'statut_marital' => $faker->randomElement(['célibataire', 'marié', 'divorcé']),
                'nombre_enfants' => $faker->numberBetween(0, 3),
                'profession' => $faker->jobTitle,
                'consentement_aux_donnees' => $faker->boolean($chanceOfGettingTrue = 90)
            ]);
        }
    }
}
