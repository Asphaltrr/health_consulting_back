<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class LitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numeroLit = 1;
        $numeroChambre = 1;
        $qteLitParChambre = 1;

        while ($numeroLit <= 50){
            while($qteLitParChambre < 5){
                $listeLit = [
                    'description' => 'lit ',
                    'statut' => 0,
                    'chambre_id' => $numeroChambre
                ];
                DB::table('lits')->insert($listeLit);
                $qteLitParChambre = $qteLitParChambre + 1;
            }
            $numeroChambre = $numeroChambre + 1;
            $qteLitParChambre = 1;
            $numeroLit++;
        }
    }
}
