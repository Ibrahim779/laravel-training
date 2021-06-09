<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.dashboard.product.products', ['products' => $products]);
    }
}
