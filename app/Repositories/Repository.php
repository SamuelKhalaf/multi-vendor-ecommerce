<?php

namespace App\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{

    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->pagination(PAGINATE_COUNT);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        return $record->delete();
    }

    public function show($id)
    {
        $record = $this->model->findOrFail($id);
        return $record->get()->first();

    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel($model)
    {
        return $this->model = $model;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
