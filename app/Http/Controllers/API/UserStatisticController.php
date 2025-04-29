<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStatistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class UserStatisticController extends Controller
{
    /**
     * @OA\Get(...) // ... tes annotations ...
     */
    public function getProgress(User $user): JsonResponse
    {
        try {
            // --- 1. Récupérer les statistiques globales ---
            $stats = UserStatistic::where('user_id', $user->id)
                                  ->whereNull('competition_id')
                                  ->first();

            // --- 2. Récupérer le nombre de compétitions ---
            $competitionsCount = DB::table('competition_registrations')
                                   ->where('user_id', $user->id)
                                   ->distinct('competition_id')
                                   ->count();

            // --- 3. Récupérer le rang/niveau ---
            $rank = $user->rank ?? 'N/A'; // Assure-toi que 'rank' existe sur User ou adapte

            // --- 4. Récupérer les activités récentes (5 derniers combats) ---
            $recentMatches = DB::table('fights')
                               ->where(function ($query) use ($user) {
                                   // Utilise les noms de colonnes corrigés
                                   $query->where('athlete1_id', $user->id)
                                         ->orWhere('athlete2_id', $user->id);
                               })
                               // Utilise le nom de colonne corrigé pour la date/heure
                               ->orderBy('scheduled_time', 'desc') // Ou 'created_at' / 'updated_at' si plus pertinent
                               ->take(5)
                               ->get(); // Récupère les colonnes nécessaires (id, athlete1_id, athlete2_id, winner_id, scheduled_time, score_athlete1, score_athlete2)

            // Formate les combats pour le frontend
            $activities = $this->formatMatchesAsActivities($recentMatches, $user->id);

            // --- 5. Construire la réponse JSON ---
            $progressData = [
                'matches_won' => $stats ? $stats->matches_won : 0,
                'matches_played' => $stats ? $stats->matches_played : 0,
                'points_scored' => $stats ? $stats->points_scored : 0,
                'competitions_count' => $competitionsCount,
                'rank' => $rank,
                'activities' => $activities,
            ];

            return response()->json($progressData);

        } catch (Exception $e) {
            Log::error("Error fetching progress for user ID {$user->id}: " . $e->getMessage(), [
                'exception' => $e
            ]);
            return response()->json([
                'message' => 'A server error occurred while fetching user progress.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Fonction d'aide pour transformer les données de combats en liste d'activités.
     */
    private function formatMatchesAsActivities($matches, $currentUserId): array
    {
        if ($matches->isEmpty()) {
            return [];
        }

        // Pré-charger les noms des adversaires (utilise les colonnes corrigées)
        $opponentIds = $matches->pluck('athlete1_id')
                             ->merge($matches->pluck('athlete2_id'))
                             ->unique()
                             ->diff([$currentUserId])
                             ->values();
        $opponents = User::whereIn('id', $opponentIds)->pluck('fullname', 'id'); // Assure-toi que 'fullname' est correct

        $formattedActivities = [];
        foreach ($matches as $match) {
             // Utilise les noms de colonnes corrigés de la table 'fights'
            $opponentId = ($match->athlete1_id == $currentUserId) ? $match->athlete2_id : $match->athlete1_id;
            $opponentName = $opponents->get($opponentId, 'Unknown Opponent');

            $description = "Fight against " . $opponentName; // Changé "Match" en "Fight" pour cohérence
            $type = 'event';

            // Détermine le résultat (utilise la colonne corrigée 'winner_id')
            if (isset($match->winner_id)) {
                if ($match->winner_id == $currentUserId) {
                    $type = 'win';
                    $description .= " (Won)";
                } elseif ($match->winner_id == $opponentId) {
                    $type = 'loss';
                    $description .= " (Lost)";
                } elseif ($match->winner_id === null) {
                     // Gère le cas où winner_id est null (peut-être un match nul ou non terminé ?)
                     // Tu peux ajuster le type et la description ici si nécessaire
                     $type = 'draw'; // Ou 'pending'/'scheduled' selon le statut du combat
                     $description .= " (Result Pending/Draw)";
                 }
            } else {
                 // Gère le cas où winner_id n'est même pas défini (si la colonne peut être absente ?)
                 // Probablement pas nécessaire si la colonne existe toujours
            }

             // Ajoute le score (utilise les colonnes corrigées 'score_athlete1' et 'score_athlete2')
             if (isset($match->score_athlete1) && isset($match->score_athlete2)) {
                // Affiche le score du point de vue de l'utilisateur actuel
                $myScore = ($match->athlete1_id == $currentUserId) ? $match->score_athlete1 : $match->score_athlete2;
                $opponentScore = ($match->athlete1_id == $currentUserId) ? $match->score_athlete2 : $match->score_athlete1;
                $description .= " Score: {$myScore} - {$opponentScore}";
             }


            $formattedActivities[] = [
                'id' => 'fight_' . $match->id, // Utilise l'ID du combat
                'description' => $description,
                'date' => $match->scheduled_time, // Utilise la colonne de date/heure corrigée
                'type' => $type,
            ];
        }
        return $formattedActivities;
    }
}