<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
        $category->delete();
        return back();
    }
    private function saveData($category ,$request)
    {
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        if ($category->img){
            if ($request->img){
                $category->img = $request->img->store('categories','public');
            }
        }else{
            $category->img = $request->img->store('categories','public');
        }
        $category->save();
    }
}
