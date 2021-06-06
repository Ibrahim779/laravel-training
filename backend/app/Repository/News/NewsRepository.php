<?php


namespace App\Repository\News;


use App\Models\News;

class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::all();
    }

}
