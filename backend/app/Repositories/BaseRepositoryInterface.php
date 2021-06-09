<?php


namespace App\Repositories;


interface BaseRepositoryInterface
{

    public function all();

    public function store($model, $request);

    public function update($model ,$request);

    public function delete($model);

}
