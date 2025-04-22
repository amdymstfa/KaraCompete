<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseEloquentRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(
        array $columns = ['*'], array $relations = []
    ): Collection {
        return $this->model->with($relations)->get($columns);
    }

    public function findById(
        int $modelId, array $columns = ['*'], array $relations = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->find($modelId);
    }

    public function create(
        array $payload
    ): Model {
        return $this->model->create($payload);
    }

    public function update(
        int $modelId, array $payload
    ): bool {
        $model = $this->findById($modelId);
        if (!$model) {
            return false;
        }

        return $model->update($payload);
    }

    public function deleteById(
        int $modelId
    ): bool {
        $model = $this->findById($modelId);
        if (!$model) {
            return false; 
        }

        return $model->delete();
    }
}