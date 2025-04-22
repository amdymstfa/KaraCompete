<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use App\Models\User;

interface UserServiceInterface
{
    /**
     * Récupère tous les utilisateurs.
     * @return Collection
     */
    public function getAllUsers(): Collection;

    /**
     * Trouve un utilisateur par son ID.
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): ?User;

    /**
     * Crée un nouvel utilisateur.
     * @param array $data Données validées pour la création.
     * @return User L'utilisateur créé.
     */
    public function createUser(array $data): User;

    /**
     * Met à jour un utilisateur par son ID.
     * @param int $id ID de l'utilisateur à mettre à jour.
     * @param array $data Données validées pour la mise à jour.
     * @return bool True si succès, false sinon.
     */
    public function updateUser(int $id, array $data): bool;

    /**
     * Supprime un utilisateur par son ID.
     * @param int $id ID de l'utilisateur à supprimer.
     * @return bool True si succès, false sinon.
     */
    public function deleteUser(int $id): bool;
}