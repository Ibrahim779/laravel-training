<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::inRandomOrder()->take(3)->get();
        $products = Product::inRandomOrder()->paginate(8);
        return view('site.index', compact('categories', 'products'));
    }

}
