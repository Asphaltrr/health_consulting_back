<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ActSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actMedical = [
            ['libelleAct' => 'pansement'],
            ['libelleAct' => 'Prélèvement sanguin'],
        ];
        DB::table('act_medicals')->insert($actMedical);
    }
}
