<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\Category;
use App\Models\User;
use App\Models\Fight; 

class FightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure the Fight model exists
        if (!class_exists(Fight::class)) {
             $this->command->error('Fight model not found. Please create it first: php artisan make:model Fight');
             return;
        }

        // 2. Get IDs of necessary entities
        $competitionIds = Competition::whereIn('status', ['scheduled', 'ongoing', 'completed'])->pluck('id'); // Fights can exist for completed comps too
        $categoryIds = Category::where('is_active', true)->pluck('id');
        // Get active athletes (need at least 2)
        $athleteIds = User::where('role', 'athlete')->where('status', 'active')->pluck('id');
        // Get active referees (need at least 1)
        $refereeIds = User::where('role', 'referee')->where('status', 'active')->pluck('id');

        // 3. Check if we have enough data
        if ($competitionIds->isEmpty() || $categoryIds->isEmpty() || $athleteIds->count() < 2 || $refereeIds->isEmpty()) {
            $this->command->warn('Cannot seed fights: Missing competitions, categories, active referees, or at least two active athletes.');
            return;
        }

        // 4. Configuration
        $numberOfFights = 75; // Adjust as needed
        $createdCount = 0;
        $possibleStatuses = ['scheduled', 'completed', 'cancelled']; // 'ongoing' is harder to seed randomly
        $possibleResults = ['IPPON', 'WAZA-ARI X2', 'TIMEUP', 'KIKEN', 'HANSOKU'];

        $this->command->info("Attempting to seed {$numberOfFights} fights...");

        for ($i = 0; $i < $numberOfFights; $i++) {
            $competitionId = $competitionIds->random();
            $categoryId = $categoryIds->random();
            $refereeId = $refereeIds->random();

            // Select two DIFFERENT athletes randomly
            $selectedAthleteIds = $athleteIds->random(2)->all();
            $athlete1Id = $selectedAthleteIds[0];
            $athlete2Id = $selectedAthleteIds[1];

            // Determine fight status randomly
            $status = fake()->randomElement($possibleStatuses);
            $winnerId = null;
            $score1 = 0;
            $score2 = 0;
            $resultDetails = null;
            $scheduledTime = fake()->dateTimeBetween('-1 month', '+1 month'); // Random time around now

            // If the fight is completed, determine winner and scores
            if ($status === 'completed') {
                $winnerId = fake()->randomElement([$athlete1Id, $athlete2Id]);
                if ($winnerId == $athlete1Id) {
                    $score1 = fake()->numberBetween(1, 5);
                    $score2 = fake()->numberBetween(0, $score1 - 1); // Ensure winner has higher score
                } else {
                    $score2 = fake()->numberBetween(1, 5);
                    $score1 = fake()->numberBetween(0, $score2 - 1);
                }
                $resultDetails = fake()->randomElement($possibleResults);
                // Adjust scheduled time to be in the past
                $scheduledTime = fake()->dateTimeBetween('-2 months', '-1 day');
            } elseif ($status === 'cancelled') {
                 $scheduledTime = fake()->dateTimeBetween('-2 months', '+1 week'); // Cancelled could be past or future
            } else { // scheduled
                 $scheduledTime = fake()->dateTimeBetween('+1 day', '+2 months'); // Must be in the future
            }


            $fightData = [
                'competition_id' => $competitionId,
                'category_id' => $categoryId,
                'athlete1_id' => $athlete1Id,
                'athlete2_id' => $athlete2Id,
                'referee_id' => $refereeId, // Assign the randomly chosen referee
                'winner_id' => $winnerId,
                'round_number' => fake()->numberBetween(1, 4), // Example round numbers
                'match_number_in_round' => fake()->numberBetween(1, 8), // Example match numbers
                'scheduled_time' => $scheduledTime,
                'tatami_number' => fake()->randomElement(['1', '2', '3', 'A', 'B', 'Central']),
                'status' => $status,
                'score_athlete1' => $score1,
                'score_athlete2' => $score2,
                'result_details' => $resultDetails,
            ];

            // Create the fight record
            try {
                 // We use create() here as uniqueness isn't based on simple fields
                 // firstOrCreate would be complex to define for random fights
                 Fight::create($fightData);
                 $createdCount++;
            } catch (\Illuminate\Database\QueryException $e) {
                 $this->command->warn("DB warning during fight seeding: {$e->getMessage()}");
                 continue; // Skip if there's an issue (e.g., model setup)
            } catch (\Illuminate\Database\Eloquent\MassAssignmentException $e) {
                 $this->command->error("Mass assignment error for Fight model. Check \$fillable property in App\Models\Fight. Error: {$e->getMessage()}");
                 return; // Stop if model isn't configured correctly
            }
        }

        $this->command->info("Fight seeding completed. Created {$createdCount} fights.");
    }
}