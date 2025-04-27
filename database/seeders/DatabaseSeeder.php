<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ClubSeeder::class,
            UserSeeder::class, 
            CompetitionSeeder::class,
            CategorySeeder::class,
            CompetitionRefereeSeeder::class, 
            CompetitionRegistrationSeeder::class,
            FightSeeder::class, 
            GlobalStatisticSeeder::class, 
            UserStatisticSeeder::class, 
        ]);
    }
}
