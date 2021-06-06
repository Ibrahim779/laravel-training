<?php


namespace App\Traits\SaveData;


use Illuminate\Support\Facades\Storage;

trait CategorySaveData
{
    protected function saveData($category ,$request)
    {
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        if ($request->img) {
            if ($category->img){
                Storage::disk('public')->delete($category->img);
                $category->img = $request->img->store('categories','public');
            } else {
                $category->img = $request->img->store('categories','public');
            }
        }
        $category->save();
    }

}
