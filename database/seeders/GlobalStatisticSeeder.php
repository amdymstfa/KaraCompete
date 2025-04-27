<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GlobalStatistic;
use App\Models\Competition;
use App\Models\User;
use App\Models\Fight;
use Illuminate\Support\Facades\DB; // Nécessaire pour DB::raw
use Carbon\Carbon;

class GlobalStatisticSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Calculating and Seeding Global Statistics...');

        $calculationDate = Carbon::now(); // Moment où ces stats sont calculées

        // --- Calcul des Statistiques Globales (competition_id = NULL) ---
        $totalAthletes = User::where('role', 'athlete')->where('status', 'active')->count();
        // Compte tous les combats enregistrés, peu importe leur statut initialement prévu
        $totalMatchesScheduled = Fight::count();
        // Compte uniquement les combats qui ont réellement eu lieu et sont terminés
        $totalMatchesCompleted = Fight::where('status', 'completed')->count();
        // Somme des scores de tous les combats terminés
        // Utilisation de DB::raw pour additionner les colonnes dans la requête SQL
        $totalPointsScored = (int)Fight::where('status', 'completed')
                                    ->sum(DB::raw('score_athlete1 + score_athlete2'));

        // Utilise updateOrCreate pour insérer ou mettre à jour le snapshot global
        // La clé d'unicité est 'competition_id' (null ici) et 'calculation_date'
        // -> On crée un snapshot global par jour pour éviter trop d'entrées si lancé souvent
        GlobalStatistic::updateOrCreate(
            [
                'competition_id' => null,
                'calculation_date' => $calculationDate->startOfDay(), // Début du jour pour la clé unique
            ],
            [
                'total_athletes' => $totalAthletes,
                'total_matches_scheduled' => $totalMatchesScheduled,
                'total_matches_completed' => $totalMatchesCompleted,
                'total_points_scored' => $totalPointsScored,
                // 'updated_at' sera mis à jour automatiquement
            ]
        );
        $this->command->info('Seeded/Updated 1 current global snapshot.');


        // --- Optionnel: Calcul par compétition existante ---
        $competitions = Competition::all(); // Récupère toutes les compétitions
        $seededPerCompetition = 0;

        if ($competitions->isEmpty()) {
            $this->command->warn('No competitions found, skipping per-competition statistics seeding.');
        } else {
            foreach ($competitions as $competition) {
                // Athlètes ayant participé à AU MOINS UN combat dans cette compétition
                $compAthleteIds = Fight::where('competition_id', $competition->id)
                                        ->pluck('athlete1_id')
                                        ->merge(Fight::where('competition_id', $competition->id)->pluck('athlete2_id'))
                                        ->filter() // Enlève les IDs null (si un combat n'avait pas d'athlète assigné)
                                        ->unique();
                $compTotalAthletes = $compAthleteIds->count();

                // Calculs spécifiques à cette compétition
                $compMatchesScheduled = Fight::where('competition_id', $competition->id)->count();
                $compMatchesCompleted = Fight::where('competition_id', $competition->id)->where('status', 'completed')->count();
                $compPointsScored = (int)Fight::where('competition_id', $competition->id)
                                           ->where('status', 'completed')
                                           ->sum(DB::raw('score_athlete1 + score_athlete2'));

                // Met à jour ou crée le snapshot pour cette compétition pour aujourd'hui
                GlobalStatistic::updateOrCreate(
                    [
                        'competition_id' => $competition->id,
                        'calculation_date' => $calculationDate->startOfDay(),
                    ],
                    [
                        'total_athletes' => $compTotalAthletes,
                        'total_matches_scheduled' => $compMatchesScheduled,
                        'total_matches_completed' => $compMatchesCompleted,
                        'total_points_scored' => $compPointsScored,
                    ]
                );
                $seededPerCompetition++;
            }
             $this->command->info("Seeded/Updated snapshots for {$seededPerCompetition} competitions.");
        }

        $this->command->info('Global Statistics seeding completed.');
    }
}