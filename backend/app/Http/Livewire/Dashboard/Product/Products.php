<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public $productId;
    public $name_ar;
    public $name_en;
    public $price;
    public $description_ar;
    public $description_en;
    public $category_id;
    public $img;

    protected $rules = [
        'name_ar' => 'required|min:5|max:255',
        'name_en' => 'required|min:5|max:255',
        'price' => 'required|numeric|min:0|not_in:0',
        'description_ar' => 'required|min:10',
        'description_en' => 'required|min:10',
        'category_id' => 'required'
    ];

    private  $productRepository;

    public function render(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $products = $this->productRepository->all();
        $categories = Category::getName()->get();
        return view('livewire.dashboard.product.products',
            ['products' => $products, 'categories' => $categories]);
    }

    public function store(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->validate();
        $this->productRepository->store(new Product, $this);
        $this->dispatchBrowserEvent('addProduct');
    }

    public function update(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->validate();
        $this->productRepository->update(Product::find($this->productId), $this);
        $this->dispatchBrowserEvent('editProduct');
    }

    public function delete(ProductRepositoryInterface $productRepository, Product $product)
    {
        $this->productRepository = $productRepository;
        Storage::disk('public')->delete($product->img);
        $this->productRepository->delete($product);
    }

    public function resetData(Product $product)
    {
        $this->productId = $product->id;
        $this->name_ar = $product->name_ar;
        $this->name_en = $product->name_en;
        $this->description_ar = $product->description_ar;
        $this->description_en = $product->description_en;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
    }

    public function removeData()
    {
        $this->name_ar = null;
        $this->name_en = null;
        $this->description_ar = null;
        $this->description_en = null;
        $this->price = null;
        $this->category_id = null;
    }

}
