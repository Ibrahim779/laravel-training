<?php


namespace App\Repositories\Product;


use App\Models\Category;
use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{

    public function getCategoryProducts($category);

    public function getWithPagination();

    public function getRelatedProducts($product);

    public function search($keyword);
}
