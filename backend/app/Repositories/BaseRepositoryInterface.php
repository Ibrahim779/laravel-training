<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{

    public function all();

    public function store(Model $model, $request);

    public function update(Model $model ,$request);

    public function delete(Model $model);

}
