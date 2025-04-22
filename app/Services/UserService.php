<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getAllUsers(): Collection
    {
        try {
            return $this->userRepository->getAll();
        } catch (Exception $e) {
            Log::error('Erreur Service getAllUsers: ' . $e->getMessage());
            return new Collection();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getUserById(int $id): ?User
    {
        try {
            return $this->userRepository->findById($id);
        } catch (Exception $e) {
            Log::error("Erreur Service getUserById (ID: {$id}): " . $e->getMessage());
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function createUser(array $data): User
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create($data);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erreur Service createUser: ' . $e->getMessage(), ['data' => $data]);
            throw new Exception("Impossible de créer l'utilisateur. Erreur: " . $e->getMessage());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function updateUser(int $id, array $data): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->userRepository->update($id, $data);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Erreur Service updateUser (ID: {$id}): " . $e->getMessage(), ['data' => $data]);
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUser(int $id): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->userRepository->deleteById($id);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Erreur Service deleteUser (ID: {$id}): " . $e->getMessage());
            return false;
        }
    }
}