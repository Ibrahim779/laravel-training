<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
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
        return view('dashboard.products.index');
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(ProductRequest $request)
    {
        $this->productRepository->store(new Product ,$request);
        return redirect()->route('dashboard.products.index');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productRepository->update($product, $request);
        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product)
    {
        $this->productRepository->delete($product);
        return back();
    }
}
