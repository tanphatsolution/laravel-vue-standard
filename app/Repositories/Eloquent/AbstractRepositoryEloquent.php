<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepositoryEloquent implements AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function on($connection = null)
    {
        return $this->model->on($connection);
    }

    public function newQuery()
    {
        return clone $this->model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(Model $entity, array $attributes)
    {
        return $entity->update($attributes);
    }

    public function destroy($ids = [])
    {
        return $this->model->destroy($ids);
    }

    public function delete(Model $entity)
    {
        return $entity->delete();
    }

    public function take($limit, $columns = ['*'])
    {
        return $this->model->orderBy('id','DESC')->take($limit)->get($columns);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->orderBy('id','DESC')->paginate($limit, $columns);
    }

    public function datatables($columns = ['*'], $with = [])
    {
        return $this->model->with($with)->orderBy('id', 'desc')->get($columns);
    }
}
