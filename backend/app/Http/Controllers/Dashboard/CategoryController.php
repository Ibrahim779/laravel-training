<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use App\Traits\SaveData\CategorySaveData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use CategorySaveData;

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->saveData(new Category, $request);
        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $this->saveData($category, $request);
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category->img);
        $category->delete();
        return back();
    }

}
