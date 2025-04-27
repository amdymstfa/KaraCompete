<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserStatistic;
use App\Models\User;
use App\Models\Fight;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserStatisticSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Calculating and Seeding User Statistics...');

        // Récupère tous les utilisateurs qui sont des athlètes actifs
        $athletes = User::where('role', 'athlete')->where('status', 'active')->get();

        if ($athletes->isEmpty()) {
            $this->command->warn('No active athletes found, skipping user statistics seeding.');
            return;
        }

        $calculationTime = Carbon::now();
        $processedCount = 0;

        foreach ($athletes as $athlete) {
            $userId = $athlete->id;

            // --- Calcul des statistiques globales pour cet athlète (competition_id = NULL) ---

            // Matches joués (combats terminés où l'athlète était présent)
            $matchesPlayed = Fight::where('status', 'completed')
                                ->where(function ($query) use ($userId) {
                                    $query->where('athlete1_id', $userId)
                                          ->orWhere('athlete2_id', $userId);
                                })
                                ->count();

            // Matches gagnés
            $matchesWon = Fight::where('winner_id', $userId)->count();

            // Matches perdus (combats terminés, non gagnés par l'athlète, où il a joué)
            $matchesLost = Fight::where('status', 'completed')
                                ->whereNotNull('winner_id') // Assure qu'il y a un gagnant défini
                                ->where('winner_id', '!=', $userId)
                                ->where(function ($query) use ($userId) {
                                    $query->where('athlete1_id', $userId)
                                          ->orWhere('athlete2_id', $userId);
                                })
                                ->count();

            // Matches nuls (combats terminés SANS gagnant défini où l'athlète a joué)
            // Hypothèse : un combat terminé sans winner_id est un nul. Adapte si ta logique est différente.
            $matchesDrawn = Fight::where('status', 'completed')
                                 ->whereNull('winner_id')
                                 ->where(function ($query) use ($userId) {
                                     $query->where('athlete1_id', $userId)
                                           ->orWhere('athlete2_id', $userId);
                                 })
                                 ->count();

            // Points marqués
            $pointsScoredAsAthlete1 = (int)Fight::where('status', 'completed')
                                             ->where('athlete1_id', $userId)
                                             ->sum('score_athlete1');
            $pointsScoredAsAthlete2 = (int)Fight::where('status', 'completed')
                                             ->where('athlete2_id', $userId)
                                             ->sum('score_athlete2');
            $totalPointsScored = $pointsScoredAsAthlete1 + $pointsScoredAsAthlete2;

            // Points encaissés
            $pointsConcededAsAthlete1 = (int)Fight::where('status', 'completed')
                                               ->where('athlete1_id', $userId)
                                               ->sum('score_athlete2'); // Score de l'adversaire
            $pointsConcededAsAthlete2 = (int)Fight::where('status', 'completed')
                                               ->where('athlete2_id', $userId)
                                               ->sum('score_athlete1'); // Score de l'adversaire
            $totalPointsConceded = $pointsConcededAsAthlete1 + $pointsConcededAsAthlete2;


            // Met à jour ou crée les statistiques globales pour cet utilisateur
            UserStatistic::updateOrCreate(
                [
                    'user_id' => $userId,
                    'competition_id' => null, // Clé pour les stats globales de l'utilisateur
                ],
                [
                    'matches_played' => $matchesPlayed,
                    'matches_won' => $matchesWon,
                    'matches_lost' => $matchesLost,
                    'matches_drawn' => $matchesDrawn,
                    'points_scored' => $totalPointsScored,
                    'points_conceded' => $totalPointsConceded,
                    'last_calculated_at' => $calculationTime,
                ]
            );
            $processedCount++;

            // --- TODO Optionnel: Calcul par compétition pour cet athlète ---
            // Si tu veux aussi stocker les stats par compétition pour chaque utilisateur :
            // 1. Trouve les competition_id uniques où cet athlète a combattu.
            //    $competitionIds = Fight::where('athlete1_id', $userId)->orWhere('athlete2_id', $userId)->distinct()->pluck('competition_id');
            // 2. Boucle sur ces $competitionIds.
            // 3. Refais les calculs ci-dessus en ajoutant ->where('competition_id', $compId) à chaque requête Fight::...
            // 4. Appelle updateOrCreate avec 'competition_id' => $compId dans le premier tableau.

        } // Fin de la boucle foreach athlete

        $this->command->info("Calculated and seeded/updated statistics for {$processedCount} athletes.");
        $this->command->info('User Statistics seeding completed.');
    }
}