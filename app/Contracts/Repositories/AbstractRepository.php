<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AbstractRepository
{
    public function getModel();

    public function on($connection = null);

    public function newQuery();

    public function all($columns = ['*']);

    public function find($id, $columns = ['*']);

    public function findOrFail($id, $columns = ['*']);

    public function create(array $attributes);

    public function update(Model $entity, array $attributes);

    public function destroy($ids = []);

    public function delete(Model $entity);

    public function take($limit, $columns = ['*']);

    public function paginate($limit = null, $columns = ['*']);

    public function datatables($columns = ['*'], $with = []);
}
