<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::inRandomOrder()->take(3)->get();
        $products = Product::inRandomOrder()->take(8)->get();
        $news = News::inRandomOrder()->take(3)->get();
        return view('site.index', compact('categories', 'products', 'news'));
    }

}
