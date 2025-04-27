<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $usersData = [
            // Admins (3)
            [
                'fullname' => 'Admin Principal', 'email' => 'admin@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => null, 'age' => null, 'club' => null, 'role' => 'admin', 'status' => 'active',
            ],
            [
                'fullname' => 'Moustapha Ndiaye', 'email' => 'moustapha@example.com', 'password' => Hash::make('password'),
                'state' => 'Safi', 'grade' => null, 'age' => '26-35', 'club' => 'YouCode Dojo', 'role' => 'admin', 'status' => 'active',
            ],
             [
                'fullname' => 'Awa Gueye', 'email' => 'awa.admin@example.com', 'password' => Hash::make('password'),
                'state' => 'Louga', 'grade' => null, 'age' => '36-45', 'club' => null, 'role' => 'admin', 'status' => 'active',
            ],

            // Referees (5)
            [
                'fullname' => 'Ousmane Sow', 'email' => 'ousmane@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Brown Belt', 'age' => '36-45', 'club' => 'Dojo Kaolack', 'role' => 'referee', 'status' => 'active',
            ],
            [
                'fullname' => 'Ibrahima Kane', 'email' => 'ibrahima@example.com', 'password' => Hash::make('password'),
                'state' => 'Fatick', 'grade' => 'Black Belt', 'age' => '46+', 'club' => 'Old School Karate', 'role' => 'referee', 'status' => 'active',
            ],
            [
                'fullname' => 'Ndeye Coumba', 'email' => 'ndeye.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Black Belt', 'age' => '26-35', 'club' => 'SenKarate Club', 'role' => 'referee', 'status' => 'active',
            ],
             [
                'fullname' => 'Aliou Diallo', 'email' => 'aliou.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Tambacounda', 'grade' => 'Brown Belt', 'age' => '46+', 'club' => 'Oriental Tigers', 'role' => 'referee', 'status' => 'pending', // Arbitre en attente
            ],
             [
                'fullname' => 'Mariama Ba', 'email' => 'mariama.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Black Belt', 'age' => '36-45', 'club' => 'North Stars', 'role' => 'referee', 'status' => 'suspended', // Arbitre suspendu
            ],

            [
                'fullname' => 'Fatou Ndiaye', 'email' => 'fatou@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Blue Belt', 'age' => '18-25', 'club' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Aminata Fall', 'email' => 'aminata@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Green Belt', 'age' => '18-25', 'club' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'pending', // En attente
            ],
            [
                'fullname' => 'Cheikh Ba', 'email' => 'cheikh@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Yellow Belt', 'age' => 'Under 18', 'club' => 'North Stars', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Mame Diarra', 'email' => 'diarra@example.com', 'password' => Hash::make('password'),
                'state' => 'Touba', 'grade' => 'White Belt', 'age' => '18-25', 'club' => 'Touba Warriors', 'role' => 'athlete', 'status' => 'suspended', // Suspendu
            ],
            [
                'fullname' => 'Aissatou Diallo', 'email' => 'aissatou@example.com', 'password' => Hash::make('password'),
                'state' => 'Kolda', 'grade' => 'Orange Belt', 'age' => '26-35', 'club' => 'Kolda Club', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Salimata Seck', 'email' => 'salimata@example.com', 'password' => Hash::make('password'),
                'state' => 'Matam', 'grade' => 'Green Belt', 'age' => '36-45', 'club' => 'Matam Club', 'role' => 'athlete', 'status' => 'pending', // En attente
            ],
            [
                'fullname' => 'Pape Omar', 'email' => 'pape.omar@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Black Belt', 'age' => '26-35', 'club' => 'SenKarate Club', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Bineta Sarr', 'email' => 'bineta.sarr@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Brown Belt', 'age' => '18-25', 'club' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Daouda Faye', 'email' => 'daouda.faye@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Blue Belt', 'age' => 'Under 18', 'club' => 'Dojo Kaolack', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Khadija Mbaye', 'email' => 'khadija.mbaye@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Orange Belt', 'age' => '26-35', 'club' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Mamadou Diallo', 'email' => 'mamadou.diallo@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'White Belt', 'age' => '18-25', 'club' => 'New Wave Dojo', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Astou Diouf', 'email' => 'astou.diouf@example.com', 'password' => Hash::make('password'),
                'state' => 'Fatick', 'grade' => 'Yellow Belt', 'age' => 'Under 18', 'club' => 'Old School Karate', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Babacar Cissé', 'email' => 'babacar.cisse@example.com', 'password' => Hash::make('password'),
                'state' => 'Touba', 'grade' => 'Green Belt', 'age' => '26-35', 'club' => 'Touba Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Rama Kane', 'email' => 'rama.kane@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Black Belt', 'age' => '18-25', 'club' => 'North Stars', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Issa Fall', 'email' => 'issa.fall@example.com', 'password' => Hash::make('password'),
                'state' => 'Kolda', 'grade' => 'Blue Belt', 'age' => '36-45', 'club' => 'Kolda Club', 'role' => 'athlete', 'status' => 'pending',
            ],
            [
                'fullname' => 'Sophie Gomis', 'email' => 'sophie.gomis@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Brown Belt', 'age' => '26-35', 'club' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Abdoulaye Traoré', 'email' => 'abdoulaye.traore@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Orange Belt', 'age' => '18-25', 'club' => 'Rising Sun Dojo', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Fatoumata Sylla', 'email' => 'fatoumata.sylla@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Green Belt', 'age' => 'Under 18', 'club' => 'Dojo Kaolack', 'role' => 'athlete', 'status' => 'suspended',
            ],
             [
                'fullname' => 'Malick Dieng', 'email' => 'malick.dieng@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Yellow Belt', 'age' => '18-25', 'club' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Coumba Ndao', 'email' => 'coumba.ndao@example.com', 'password' => Hash::make('password'),
                'state' => 'Safi', 'grade' => 'White Belt', 'age' => '26-35', 'club' => 'YouCode Dojo', 'role' => 'athlete', 'status' => 'active',
            ],
              [
                'fullname' => 'Samba Camara', 'email' => 'samba.camara@example.com', 'password' => Hash::make('password'),
                'state' => 'Matam', 'grade' => 'Black Belt', 'age' => '36-45', 'club' => 'Matam Club', 'role' => 'athlete', 'status' => 'active',
            ],
              [
                'fullname' => 'Amina Sow', 'email' => 'amina.sow@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Blue Belt', 'age' => '18-25', 'club' => 'SenKarate Club', 'role' => 'athlete', 'status' => 'pending',
            ],
        ];

        $count = 0;
        foreach ($usersData as $userData) {
             if (isset($userData['status']) && ($userData['status'] === 'pending' || $userData['status'] === 'suspended')) {
                 $userData['email_verified_at'] = null;
             } else {
                 $userData['email_verified_at'] = now();
             }

            User::firstOrCreate(
                ['email' => $userData['email']], 
                $userData                      
            );
            $count++;
        }

        $this->command->info("User seeding completed. Attempted to create/update {$count} users.");
    }
}