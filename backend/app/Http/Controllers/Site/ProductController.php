<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getWithPagination();
        $categories = Category::getName()->get();
        return view('site.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $relatedProducts = $this->productRepository->getRelatedProducts($product);
        return view('site.products.show', compact('product', 'relatedProducts'));
    }

    public function getCategoryProducts($category)
    {
        $products = $this->productRepository->getCategoryProducts($category);
        $categories = Category::getName()->get();
        return view('site.products.index', compact('products', 'categories'));
    }

}
