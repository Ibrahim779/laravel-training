<?php


namespace App\Repositories\Product;


use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    const PAGINATION = 9;

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function getWithPagination()
    {
        return Product::paginate(self::PAGINATION);
    }

    public function getCategoryProducts($category)
    {
        return Product::whereCategoryId($category)->paginate(self::PAGINATION);
    }

    public function getRelatedProducts($product)
    {
        return Product::whereCategoryId($product->category_id)->inRandomOrder()->get();
    }

    public function search($keyword)
    {
        return Product::search($keyword)->paginate(self::PAGINATION);
    }

    protected function saveData($product, $data)
    {
        $product->name_ar = $data->name_ar;
        $product->name_en = $data->name_en;
        $product->price = $data->price;
        $product->description_ar = $data->description_ar;
        $product->description_en = $data->description_en;
        $product->category_id = $data->category_id;
        if ($data->img) {
            if ($product->img){
                Storage::disk('public')->delete($product->img);
                $product->img = $data->img->store('products', 'public');
            } else {
                $product->img = $data->img->store('products', 'public');
            }
        }
        $product->admin_id = auth()->id();
        $product->save();
    }


}
