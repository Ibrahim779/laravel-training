<?php


namespace App\Repositories\Product;


use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    protected function saveData($product, $request)
    {
        $product->name_ar = $request->name_ar;
        $product->name_en = $request->name_en;
        $product->price = $request->price;
        $product->description_ar = $request->description_ar;
        $product->description_en = $request->description_en;
        $product->category_id = $request->category_id;
        $product->admin_id = auth()->id();
        if ($request->img) {
            if ($product->img){
                Storage::disk('public')->delete($product->img);
                $product->img = $request->img->store('products', 'public');
            } else {
                $product->img = $request->img->store('products', 'public');
            }
        }
        $product->save();
    }
}
