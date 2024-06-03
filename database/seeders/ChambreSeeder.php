<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ChambreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            $chambre = [
                'nombre_lits' => 3,
                'etage' => rand(1, 5), // Supposons que l'étage peut être entre 1 et 5
                'numero_chambre' => 'chambre-' . $i
            ];

            DB::table('chambres')->insert($chambre);
        }
    }
}
