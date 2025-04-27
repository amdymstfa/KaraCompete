<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club; // Make sure you have the Club model (php artisan make:model Club)

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the Club model exists. If not, create it: php artisan make:model Club
        if (!class_exists(Club::class)) {
             $this->command->error('Club model not found. Please create it first: php artisan make:model Club');
             return;
        }

        $clubsData = [
            // Clubs from the initial UserSeeder
            ['name' => 'SenKarate Club',    'city' => 'Dakar',      'address' => 'Adresse SenKarate Club, Dakar'],
            ['name' => 'Lions Karate',      'city' => 'Thiès',      'address' => 'Route de Saly, Thiès'],
            ['name' => 'Dojo Kaolack',      'city' => 'Kaolack',    'address' => 'Centre-ville, Kaolack'],
            ['name' => 'Southern Warriors', 'city' => 'Ziguinchor', 'address' => 'Quartier Tilène, Ziguinchor'],
            ['name' => 'North Stars',       'city' => 'Saint-Louis','address' => 'Avenue Principale, Saint-Louis'],
            ['name' => 'Touba Warriors',    'city' => 'Touba',      'address' => 'Près de la Grande Mosquée, Touba'],
            ['name' => 'Old School Karate', 'city' => 'Fatick',     'address' => 'Rue 123, Fatick'],
            ['name' => 'Kolda Club',        'city' => 'Kolda',      'address' => null], // No address specified
            ['name' => 'YouCode Dojo',      'city' => 'Safi',       'address' => 'Campus YouCode, Safi'], // Assuming Safi location for YouCode
            ['name' => 'Matam Club',        'city' => 'Matam',      'address' => 'Adresse Matam Club'],

            // Additional Clubs for variety
            ['name' => 'Rising Sun Dojo',   'city' => 'Dakar',      'address' => 'Sicap Liberté 6, Dakar'],
            ['name' => 'Tiger Claw Academy','city' => 'Mbour',      'address' => 'Saly Portudal, Mbour'],
            ['name' => 'Elite Karate Dakar','city' => 'Dakar',      'address' => 'Point E, Dakar'],
            ['name' => 'Rufisque Karate Do','city' => 'Rufisque',   'address' => 'Cité SENELEC, Rufisque'],
            ['name' => 'Pikine Budokan',    'city' => 'Pikine',     'address' => 'Près du Stade Alassane Djigo, Pikine'],
        ];

        $count = 0;
        foreach ($clubsData as $clubData) {
            // Use firstOrCreate based on the unique 'name'
            Club::firstOrCreate(
                ['name' => $clubData['name']], // Check based on unique name
                $clubData                      // Data to insert if name doesn't exist
            );
             $count++;
        }

         $this->command->info("Club seeding completed. Attempted to create/update {$count} clubs.");
    }
}