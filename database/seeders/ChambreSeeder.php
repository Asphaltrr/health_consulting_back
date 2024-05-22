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
        $nombreChambre = 1;
        while ($nombreChambre < 50){
            
            $chambre = [
                ['description' => 'Descriptif chambre'],
            ];

            DB::table('chambres')->insert($chambre);
        };
    }
}
