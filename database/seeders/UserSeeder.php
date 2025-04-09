<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'fullname' => 'Mamadou Diop',
                'email' => 'mamadou@example.com',
                'password' => Hash::make('password'),
                'state' => 'Dakar',
                'grade' => 'Black Belt',
                'age' => '26-35',
                'club' => 'SenKarate Club',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'fullname' => 'Fatou Ndiaye',
                'email' => 'fatou@example.com',
                'password' => Hash::make('password'),
                'state' => 'Thiès',
                'grade' => 'Blue Belt',
                'age' => '18-25',
                'club' => 'Lions Karate',
                'role' => 'athlete',
                'status' => 'active',
            ],
            [
                'fullname' => 'Ousmane Sow',
                'email' => 'ousmane@example.com',
                'password' => Hash::make('password'),
                'state' => 'Kaolack',
                'grade' => 'Brown Belt',
                'age' => '36-45',
                'club' => 'Dojo Kaolack',
                'role' => 'referee',
                'status' => 'active',
            ],
            [
                'fullname' => 'Aminata Fall',
                'email' => 'aminata@example.com',
                'password' => Hash::make('password'),
                'state' => 'Ziguinchor',
                'grade' => 'Green Belt',
                'age' => '18-25',
                'club' => 'Southern Warriors',
                'role' => 'athlete',
                'status' => 'pending',
            ],
            [
                'fullname' => 'Cheikh Ba',
                'email' => 'cheikh@example.com',
                'password' => Hash::make('password'),
                'state' => 'Saint-Louis',
                'grade' => 'Yellow Belt',
                'age' => 'Under 18',
                'club' => 'North Stars',
                'role' => 'athlete',
                'status' => 'active',
            ],
            [
                'fullname' => 'Mame Diarra',
                'email' => 'diarra@example.com',
                'password' => Hash::make('password'),
                'state' => 'Touba',
                'grade' => 'White Belt',
                'age' => '18-25',
                'club' => 'Touba Warriors',
                'role' => 'athlete',
                'status' => 'suspended',
            ],
            [
                'fullname' => 'Ibrahima Kane',
                'email' => 'ibrahima@example.com',
                'password' => Hash::make('password'),
                'state' => 'Fatick',
                'grade' => 'Black Belt',
                'age' => '46+',
                'club' => 'Old School Karate',
                'role' => 'referee',
                'status' => 'active',
            ],
            [
                'fullname' => 'Aissatou Diallo',
                'email' => 'aissatou@example.com',
                'password' => Hash::make('password'),
                'state' => 'Kolda',
                'grade' => 'Orange Belt',
                'age' => '26-35',
                'club' => 'Kolda Club',
                'role' => 'athlete',
                'status' => 'active',
            ],
            [
                'fullname' => 'Moustapha Ndiaye',
                'email' => 'moustapha@example.com',
                'password' => Hash::make('password'),
                'state' => 'Safi',
                'grade' => 'Brown Belt',
                'age' => '26-35',
                'club' => 'YouCode Dojo',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'fullname' => 'Salimata Seck',
                'email' => 'salimata@example.com',
                'password' => Hash::make('password'),
                'state' => 'Matam',
                'grade' => 'Green Belt',
                'age' => '36-45',
                'club' => 'Matam Club',
                'role' => 'athlete',
                'status' => 'pending',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
