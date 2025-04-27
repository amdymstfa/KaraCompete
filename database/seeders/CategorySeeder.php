<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        $categories = [

            // === KUMITE ===

            // --- Seniors ---
            ['name' => 'Senior Male Kumite -60kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => null, 'max_weight' => 60, 'is_active' => true],
            ['name' => 'Senior Male Kumite -67kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => 60, 'max_weight' => 67, 'is_active' => true],
            ['name' => 'Senior Male Kumite -75kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => 67, 'max_weight' => 75, 'is_active' => true],
            ['name' => 'Senior Male Kumite -84kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => 75, 'max_weight' => 84, 'is_active' => true],
            ['name' => 'Senior Male Kumite +84kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => 84, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Senior Female Kumite -50kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => null, 'max_weight' => 50, 'is_active' => true],
            ['name' => 'Senior Female Kumite -55kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => 50, 'max_weight' => 55, 'is_active' => true],
            ['name' => 'Senior Female Kumite -61kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => 55, 'max_weight' => 61, 'is_active' => true],
            ['name' => 'Senior Female Kumite -68kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => 61, 'max_weight' => 68, 'is_active' => true],
            ['name' => 'Senior Female Kumite +68kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => 68, 'max_weight' => null, 'is_active' => true],

            // --- Juniors (Exemple 16-17 ans) ---
            ['name' => 'Junior Male Kumite -61kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Junior (16-17)', 'min_weight' => null, 'max_weight' => 61, 'is_active' => true],
            ['name' => 'Junior Male Kumite -76kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Junior (16-17)', 'min_weight' => 61, 'max_weight' => 76, 'is_active' => true],
            ['name' => 'Junior Male Kumite +76kg',   'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Junior (16-17)', 'min_weight' => 76, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Junior Female Kumite -53kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Junior (16-17)', 'min_weight' => null, 'max_weight' => 53, 'is_active' => true],
            ['name' => 'Junior Female Kumite -59kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Junior (16-17)', 'min_weight' => 53, 'max_weight' => 59, 'is_active' => true],
            ['name' => 'Junior Female Kumite +59kg', 'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Junior (16-17)', 'min_weight' => 59, 'max_weight' => null, 'is_active' => true],

            // --- Cadets (Exemple 14-15 ans) ---
            ['name' => 'Cadet Male Kumite -57kg',    'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Cadet (14-15)', 'min_weight' => null, 'max_weight' => 57, 'is_active' => true],
            ['name' => 'Cadet Male Kumite +70kg',    'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'Cadet (14-15)', 'min_weight' => 70, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Cadet Female Kumite -54kg',  'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Cadet (14-15)', 'min_weight' => null, 'max_weight' => 54, 'is_active' => true],
            ['name' => 'Cadet Female Kumite +54kg',  'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'Cadet (14-15)', 'min_weight' => 54, 'max_weight' => null, 'is_active' => true],

            // --- Benjamins/Minimes (Exemple U14) ---
             ['name' => 'U14 Male Kumite -45kg',     'type' => 'Kumite', 'gender' => 'Male',   'age_range' => 'U14 (12-13)', 'min_weight' => null, 'max_weight' => 45, 'is_active' => true],
             ['name' => 'U14 Female Kumite +47kg',   'type' => 'Kumite', 'gender' => 'Female', 'age_range' => 'U14 (12-13)', 'min_weight' => 47, 'max_weight' => null, 'is_active' => true],


            // === KATA === (Pas de poids)

            ['name' => 'Senior Male Kata',          'type' => 'Kata', 'gender' => 'Male',   'age_range' => 'Senior (18+)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Senior Female Kata',        'type' => 'Kata', 'gender' => 'Female', 'age_range' => 'Senior (18+)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Junior Male Kata',          'type' => 'Kata', 'gender' => 'Male',   'age_range' => 'Junior (16-17)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Junior Female Kata',        'type' => 'Kata', 'gender' => 'Female', 'age_range' => 'Junior (16-17)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Cadet Male Kata',           'type' => 'Kata', 'gender' => 'Male',   'age_range' => 'Cadet (14-15)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'Cadet Female Kata',         'type' => 'Kata', 'gender' => 'Female', 'age_range' => 'Cadet (14-15)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'U14 Male Kata',             'type' => 'Kata', 'gender' => 'Male',   'age_range' => 'U14 (12-13)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],
            ['name' => 'U14 Female Kata',           'type' => 'Kata', 'gender' => 'Female', 'age_range' => 'U14 (12-13)', 'min_weight' => null, 'max_weight' => null, 'is_active' => true],

            // Exemple catégorie désactivée
            ['name' => 'Ancienne Catégorie Kumite Mixte - Obsolète', 'type' => 'Kumite', 'gender' => 'Mixed', 'age_range' => 'Obsolete Age', 'min_weight' => null, 'max_weight' => null, 'is_active' => false],

            // Exemple catégorie avec restriction de grade (si vous utilisez ces colonnes)
            // ['name' => 'Kumite Débutant Homme (Blanc-Orange)', 'type' => 'Kumite', 'gender' => 'Male', 'age_range' => 'Senior (18+)', 'min_weight' => null, 'max_weight' => null, 'min_grade' => 'White Belt', 'max_grade' => 'Orange Belt', 'is_active' => true],
        ];

        $count = 0;
        foreach ($categories as $categoryData) {
            // Assurez-vous que le modèle Category existe bien dans App\Models\Category
            // Si votre modèle est ailleurs, ajustez le use en haut du fichier
            Category::firstOrCreate(
                ['name' => $categoryData['name']], // Clé unique pour éviter doublons
                $categoryData                      // Données à insérer si non trouvé
            );
             $count++;
        }

        $this->command->info("Category seeding completed. Attempted to create/update {$count} categories.");
    }
}