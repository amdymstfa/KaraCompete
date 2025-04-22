<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\BaseEloquentRepository;

class UserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model Injection du modèle spécifique User
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}