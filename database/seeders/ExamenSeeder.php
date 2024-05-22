<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //création de la liste des examens à inserer dans la base de données
        $listeExamen = [
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem']
        ];

        DB::table('examens')->insert($listeExamen);
    }
}
