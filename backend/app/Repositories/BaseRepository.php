<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected  $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store(Model $model, $request)
    {
        $this->saveData($model, $request);
    }

    public function update(Model $model , $request)
    {
        $this->saveData($model, $request);
    }

    public function delete(Model $model)
    {
        $model->delete();
    }
    abstract protected function saveData($model, $request);
}
