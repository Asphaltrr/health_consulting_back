<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LitSeeder extends Seeder
{
    public function run(): void
    {
        // On assume qu'il y a déjà 21 chambres insérées
        for ($chambreId = 1; $chambreId <= 12; $chambreId++) {
            for ($litNum = 1; $litNum <= 3; $litNum++) {
                $lit = [
                    'id_chambre' => $chambreId,
                    'numero' => $litNum, // Numéro du lit ajouté
                    'statut' => 'libre' // Utilisez 'libre', 'occupé', etc., selon vos besoins
                ];

                DB::table('lits')->insert($lit);
            }
        }
    }
}
