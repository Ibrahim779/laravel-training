<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{

    public function all();

    public function createOrUpdate(Model $model ,$request);

    public function delete(Model $model);

}
