<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\User;
use App\Models\Category;
use App\Models\CompetitionRegistration; 


class CompetitionRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get prerequisite IDs
        $competitionIds = Competition::whereIn('status', ['scheduled', 'ongoing'])->pluck('id');
        $athleteIds = User::where('role', 'athlete')->where('status', 'active')->pluck('id');
        $categoryIds = Category::where('is_active', true)->pluck('id');

        // 2. Check prerequisites
        if ($competitionIds->isEmpty() || $athleteIds->isEmpty() || $categoryIds->isEmpty()) {
            $this->command->warn('Cannot seed registrations: Missing active competitions, athletes, or categories.');
            return;
        }

        // 3. Configuration
        $numberOfRegistrations = 50; // Number of registration attempts
        $createdCount = 0;
        $possibleStatuses = ['pending', 'approved', 'rejected', 'checked_in'];

        $this->command->info("Attempting to seed {$numberOfRegistrations} competition registrations...");

        // 4. Loop to create registrations
        for ($i = 0; $i < $numberOfRegistrations; $i++) {
            $competitionId = $competitionIds->random();
            $athleteId = $athleteIds->random();
            $categoryId = $categoryIds->random();

            $category = Category::find($categoryId); // Needed to check type for weight

            $registrationData = [
                'competition_id' => $competitionId,
                'user_id' => $athleteId,
                'category_id' => $categoryId,
                'status' => fake()->randomElement($possibleStatuses),
                // Assign weight only if category type is Kumite
                'weight_measured' => ($category && $category->type === 'Kumite')
                                        ? fake()->randomFloat(2, 40, 120)
                                        : null,
                'participant_number' => null,
            ];

            // 5. Create registration using firstOrCreate (prevents duplicates)
            try {
                 CompetitionRegistration::firstOrCreate(
                    [ // Unique key to check
                        'competition_id' => $registrationData['competition_id'],
                        'user_id' => $registrationData['user_id'],
                        'category_id' => $registrationData['category_id'],
                    ],
                    $registrationData // Data to insert if not found
                 );
                $createdCount++;

            } catch (\Illuminate\Database\QueryException $e) {
                 $this->command->warn("DB warning during registration seeding: {$e->getMessage()}");
                 continue;
            }
        }

        $this->command->info("Competition Registration seeding completed. Processed {$numberOfRegistrations} attempts. Actual distinct created/found: {$createdCount}");
    }
}