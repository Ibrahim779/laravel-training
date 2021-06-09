<?php


namespace App\Repositories;


abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($model, $request)
    {
        $this->saveData($model, $request);
    }

    public function update($model , $request)
    {
        $this->saveData($model, $request);
    }

    public function delete($model)
    {
        $model->delete();
    }
    abstract protected function saveData($model, $request);
}
