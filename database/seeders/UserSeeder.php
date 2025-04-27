<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Club; // <--- AJOUTER : On a besoin du modèle Club

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * IMPORTANT: This seeder MUST run AFTER ClubSeeder.
     */
    public function run(): void
    {
        // 1. Récupérer les IDs des clubs par leur nom pour un accès facile
        $clubs = Club::pluck('id', 'name'); // Crée un tableau associatif ['Nom du Club' => id]

        // 2. Données Utilisateurs - Remplacer 'club' par 'club_id' et mettre le nom pour référence
        // Note: La valeur réelle utilisée sera l'ID recherché à partir du nom.
        $usersData = [
            // Admins (3) - Pas de club_id (ou NULL)
            [
                'fullname' => 'Admin Principal', 'email' => 'admin@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => null, 'age' => null, 'club_name_ref' => null, 'role' => 'admin', 'status' => 'active',
            ],
            [ // Note: YouCode Dojo est un club, donc un admin peut y être affilié
                'fullname' => 'Moustapha Ndiaye', 'email' => 'moustapha@example.com', 'password' => Hash::make('password'),
                'state' => 'Safi', 'grade' => null, 'age' => '26-35', 'club_name_ref' => 'YouCode Dojo', 'role' => 'admin', 'status' => 'active',
            ],
             [
                'fullname' => 'Awa Gueye', 'email' => 'awa.admin@example.com', 'password' => Hash::make('password'),
                'state' => 'Louga', 'grade' => null, 'age' => '36-45', 'club_name_ref' => null, 'role' => 'admin', 'status' => 'active',
            ],

            // Referees (5)
            [
                'fullname' => 'Ousmane Sow', 'email' => 'ousmane@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Brown Belt', 'age' => '36-45', 'club_name_ref' => 'Dojo Kaolack', 'role' => 'referee', 'status' => 'active',
            ],
            [
                'fullname' => 'Ibrahima Kane', 'email' => 'ibrahima@example.com', 'password' => Hash::make('password'),
                'state' => 'Fatick', 'grade' => 'Black Belt', 'age' => '46+', 'club_name_ref' => 'Old School Karate', 'role' => 'referee', 'status' => 'active',
            ],
            [
                'fullname' => 'Ndeye Coumba', 'email' => 'ndeye.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Black Belt', 'age' => '26-35', 'club_name_ref' => 'SenKarate Club', 'role' => 'referee', 'status' => 'active',
            ],
             [ // Oriental Tigers n'était pas dans ClubSeeder, on le laisse null ou on ajoute le club
                'fullname' => 'Aliou Diallo', 'email' => 'aliou.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Tambacounda', 'grade' => 'Brown Belt', 'age' => '46+', 'club_name_ref' => null, 'role' => 'referee', 'status' => 'pending',
            ],
             [
                'fullname' => 'Mariama Ba', 'email' => 'mariama.ref@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Black Belt', 'age' => '36-45', 'club_name_ref' => 'North Stars', 'role' => 'referee', 'status' => 'suspended',
            ],

            // Athletes (22)
            [
                'fullname' => 'Fatou Ndiaye', 'email' => 'fatou@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Blue Belt', 'age' => '18-25', 'club_name_ref' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Aminata Fall', 'email' => 'aminata@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Green Belt', 'age' => '18-25', 'club_name_ref' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'pending',
            ],
            [
                'fullname' => 'Cheikh Ba', 'email' => 'cheikh@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Yellow Belt', 'age' => 'Under 18', 'club_name_ref' => 'North Stars', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Mame Diarra', 'email' => 'diarra@example.com', 'password' => Hash::make('password'),
                'state' => 'Touba', 'grade' => 'White Belt', 'age' => '18-25', 'club_name_ref' => 'Touba Warriors', 'role' => 'athlete', 'status' => 'suspended',
            ],
            [
                'fullname' => 'Aissatou Diallo', 'email' => 'aissatou@example.com', 'password' => Hash::make('password'),
                'state' => 'Kolda', 'grade' => 'Orange Belt', 'age' => '26-35', 'club_name_ref' => 'Kolda Club', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Salimata Seck', 'email' => 'salimata@example.com', 'password' => Hash::make('password'),
                'state' => 'Matam', 'grade' => 'Green Belt', 'age' => '36-45', 'club_name_ref' => 'Matam Club', 'role' => 'athlete', 'status' => 'pending',
            ],
            [
                'fullname' => 'Pape Omar', 'email' => 'pape.omar@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Black Belt', 'age' => '26-35', 'club_name_ref' => 'SenKarate Club', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Bineta Sarr', 'email' => 'bineta.sarr@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Brown Belt', 'age' => '18-25', 'club_name_ref' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Daouda Faye', 'email' => 'daouda.faye@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Blue Belt', 'age' => 'Under 18', 'club_name_ref' => 'Dojo Kaolack', 'role' => 'athlete', 'status' => 'active',
            ],
            [
                'fullname' => 'Khadija Mbaye', 'email' => 'khadija.mbaye@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Orange Belt', 'age' => '26-35', 'club_name_ref' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [ // New Wave Dojo n'était pas dans ClubSeeder, on le laisse null ou on ajoute le club
                'fullname' => 'Mamadou Diallo', 'email' => 'mamadou.diallo@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'White Belt', 'age' => '18-25', 'club_name_ref' => null, 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Astou Diouf', 'email' => 'astou.diouf@example.com', 'password' => Hash::make('password'),
                'state' => 'Fatick', 'grade' => 'Yellow Belt', 'age' => 'Under 18', 'club_name_ref' => 'Old School Karate', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Babacar Cissé', 'email' => 'babacar.cisse@example.com', 'password' => Hash::make('password'),
                'state' => 'Touba', 'grade' => 'Green Belt', 'age' => '26-35', 'club_name_ref' => 'Touba Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Rama Kane', 'email' => 'rama.kane@example.com', 'password' => Hash::make('password'),
                'state' => 'Saint-Louis', 'grade' => 'Black Belt', 'age' => '18-25', 'club_name_ref' => 'North Stars', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Issa Fall', 'email' => 'issa.fall@example.com', 'password' => Hash::make('password'),
                'state' => 'Kolda', 'grade' => 'Blue Belt', 'age' => '36-45', 'club_name_ref' => 'Kolda Club', 'role' => 'athlete', 'status' => 'pending',
            ],
            [
                'fullname' => 'Sophie Gomis', 'email' => 'sophie.gomis@example.com', 'password' => Hash::make('password'),
                'state' => 'Thiès', 'grade' => 'Brown Belt', 'age' => '26-35', 'club_name_ref' => 'Lions Karate', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Abdoulaye Traoré', 'email' => 'abdoulaye.traore@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Orange Belt', 'age' => '18-25', 'club_name_ref' => 'Rising Sun Dojo', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Fatoumata Sylla', 'email' => 'fatoumata.sylla@example.com', 'password' => Hash::make('password'),
                'state' => 'Kaolack', 'grade' => 'Green Belt', 'age' => 'Under 18', 'club_name_ref' => 'Dojo Kaolack', 'role' => 'athlete', 'status' => 'suspended',
            ],
             [
                'fullname' => 'Malick Dieng', 'email' => 'malick.dieng@example.com', 'password' => Hash::make('password'),
                'state' => 'Ziguinchor', 'grade' => 'Yellow Belt', 'age' => '18-25', 'club_name_ref' => 'Southern Warriors', 'role' => 'athlete', 'status' => 'active',
            ],
             [
                'fullname' => 'Coumba Ndao', 'email' => 'coumba.ndao@example.com', 'password' => Hash::make('password'),
                'state' => 'Safi', 'grade' => 'White Belt', 'age' => '26-35', 'club_name_ref' => 'YouCode Dojo', 'role' => 'athlete', 'status' => 'active',
            ],
              [
                'fullname' => 'Samba Camara', 'email' => 'samba.camara@example.com', 'password' => Hash::make('password'),
                'state' => 'Matam', 'grade' => 'Black Belt', 'age' => '36-45', 'club_name_ref' => 'Matam Club', 'role' => 'athlete', 'status' => 'active',
            ],
              [
                'fullname' => 'Amina Sow', 'email' => 'amina.sow@example.com', 'password' => Hash::make('password'),
                'state' => 'Dakar', 'grade' => 'Blue Belt', 'age' => '18-25', 'club_name_ref' => 'SenKarate Club', 'role' => 'athlete', 'status' => 'pending',
            ],
        ];

        $count = 0;
        foreach ($usersData as $data) {
            // Préparer les données pour la création/mise à jour
            $userDataToInsert = [
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'password' => $data['password'], // Le hash est déjà fait dans le tableau
                'state' => $data['state'],
                'grade' => $data['grade'],
                'age' => $data['age'],
                'role' => $data['role'],
                'status' => $data['status'],
                'email_verified_at' => (isset($data['status']) && ($data['status'] === 'pending' || $data['status'] === 'suspended')) ? null : now(),
                // --- Chercher et assigner club_id ---
                'club_id' => isset($data['club_name_ref']) ? $clubs->get($data['club_name_ref']) : null,
                // $clubs->get('Nom Club') retourne l'ID si trouvé, sinon null
            ];

            // Vérifier si un club_id a été trouvé si un nom était fourni mais pas dans la liste $clubs
            if (isset($data['club_name_ref']) && is_null($userDataToInsert['club_id'])) {
                 $this->command->warn("Club '{$data['club_name_ref']}' not found for user {$data['email']}. Setting club_id to null.");
            }

            User::firstOrCreate(
                ['email' => $userDataToInsert['email']], // Clé unique pour vérifier
                $userDataToInsert                       // Données à insérer/mettre à jour
            );
            $count++;
        }

        $this->command->info("User seeding completed (with club_id). Attempted to create/update {$count} users.");
    }
}