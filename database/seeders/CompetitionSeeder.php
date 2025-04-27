<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\User;
use Illuminate\Support\Carbon;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get IDs of existing admin users
        $adminUserIds = User::where('role', 'admin')->pluck('id');

        // Check if any admin users exist
        if ($adminUserIds->isEmpty()) {
            $this->command->warn('No admin users found. Cannot seed competitions that require an organizer.');
            return; 
        }

        // 2. Define Competition Data
        $competitionsData = [
            [
                'name' => 'Championnat National Senior 2023',
                'start_date' => Carbon::now()->subYear()->startOfMonth(), 
                'end_date' => Carbon::now()->subYear()->startOfMonth()->addDay(), 
                'location' => 'Stadium Marius Ndiaye, Dakar',
                'description' => 'Championnat national annuel pour les catégories seniors.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 32,
                'status' => 'completed', 
            ],
            [
                'name' => 'Coupe de la Ligue de Thiès 2024',
                'start_date' => Carbon::now()->subMonth()->day(15),
                'end_date' => Carbon::now()->subMonth()->day(15), 
                'location' => 'CEPS, Thiès',
                'description' => null, 
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 16,
                'status' => 'completed', 
            ],
            [
                'name' => 'Open International de Dakar 2024',
                'start_date' => Carbon::now()->addDays(3), 
                'end_date' => Carbon::now()->addDays(5), 
                'location' => 'Dakar Arena',
                'description' => 'Tournoi international ouvert aux clubs étrangers.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 64,
                'status' => 'scheduled', 
            ],
            [
                'name' => 'Tournoi Espoirs Saint-Louis',
                'start_date' => Carbon::now()->addMonth()->startOfWeek(), 
                'end_date' => Carbon::now()->addMonth()->startOfWeek(), 
                'location' => 'Stadium Joseph Gaye, Saint-Louis',
                'description' => 'Compétition pour les jeunes talents de la région nord.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 32,
                'status' => 'scheduled',
            ],
            [
                'name' => 'Compétition Régionale Kaolack ',
                'start_date' => Carbon::now()->subDays(10), 
                'end_date' => Carbon::now()->subDays(10),
                'location' => 'Kaolack',
                'description' => 'Compétition annulée pour des raisons logistiques.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 16,
                'status' => 'cancelled', 
            ],
             [
                'name' => 'Stage + Compétition Kumite Ziguinchor',
                'start_date' => Carbon::now()->addMonths(2), 
                'end_date' => Carbon::now()->addMonths(2)->addDay(), 
                'location' => 'Ziguinchor',
                'description' => 'Stage technique suivi d\'une compétition amicale.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 16,
                'status' => 'scheduled',
            ],
             [
                'name' => 'Championnat Kata Individuel - Dakar',
                'start_date' => Carbon::now()->subDays(2),
                'end_date' => Carbon::now()->addDays(1), 
                'location' => 'Stadium Iba Mar Diop',
                'description' => 'Focus exclusif sur les épreuves de Kata.',
                'organizer_id' => $adminUserIds->random(),
                'bracket_size' => 32,
                
                'status' => (Carbon::now()->between(Carbon::now()->subDays(2), Carbon::now()->addDays(1))) ? 'ongoing' : 'scheduled', // Logic for ongoing
            ],
        ];

        // 3. Create Competitions in the database
        $count = 0;
        foreach ($competitionsData as $competitionData) {
            // Use firstOrCreate to avoid duplicates if seeder runs multiple times without fresh migration
            // Using 'name' and 'start_date' as a pseudo-unique key here. Adjust if needed.
            Competition::firstOrCreate(
                [
                    'name' => $competitionData['name'],
                    'start_date' => $competitionData['start_date']
                ],
                $competitionData 
            );
            $count++;
        }

        $this->command->info("Competition seeding completed. Attempted to create/update {$count} competitions.");
    }
}